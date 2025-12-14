# Implementation Plan: Separate SQLite Database for Bitcoin Prices

## Overview
This document outlines the plan to separate Bitcoin price data into its own SQLite database (`bitcoin.sqlite`) while keeping the main application on `database.sqlite`.

## Quick Reference - Implementation Order

1. **Backup** existing databases
2. **Configure** database connections in `config/database.php`
3. **Update** `.env` file to use SQLite
4. **Create** `database/bitcoin.sqlite` file
5. **Update** `app/Models/Coinbase.php` to use bitcoin connection
6. **Check** if existing bitcoin data needs migration
7. **Run** bitcoin migration on new database
8. **Migrate** existing data (if applicable)
9. **Test** everything works
10. **Clean up** old data from main database (if migrated)

## Architecture

### Database Structure
- **Main App Database**: `database/database.sqlite`
  - Users, authentication
  - Jobs, queues
  - Activities
  - NHTSA decodeds
  - All other application tables
  
- **Bitcoin Price Database**: `database/bitcoin.sqlite`
  - Only `coinbases` table
  - Completely isolated and exportable

## Implementation Tasks

### Phase 1: Pre-Implementation Checks

#### Task 1.1: Backup Existing Data
- [ ] Backup current database(s)
- [ ] Check if `coinbases` table exists in current database
- [ ] If data exists, note the record count for verification after migration

**Backup Commands:**
```bash
# If using MySQL/PostgreSQL
php artisan db:backup  # or use your preferred backup method

# If using SQLite
cp database/database.sqlite database/database.sqlite.backup
```

#### Task 1.2: Check Current Database State
- [ ] Verify current `DB_CONNECTION` in `.env`
- [ ] Check if `database/database.sqlite` exists (if using SQLite)
- [ ] Verify `coinbases` table exists and has data (if applicable)

**Check Commands:**
```bash
# Check current connection
grep DB_CONNECTION .env

# Check if SQLite file exists
ls -la database/database.sqlite

# Check if coinbases table exists (via tinker)
php artisan tinker
>>> Schema::hasTable('coinbases')
>>> DB::table('coinbases')->count()
```

### Phase 2: Database Configuration

#### Task 2.1: Update `config/database.php`
- [ ] Change default connection from `mysql` to `sqlite`
- [ ] Add new `bitcoin_sqlite` connection configuration
- [ ] Keep existing `sqlite` connection for main app (pointing to `database.sqlite`)

**Configuration Changes:**
```php
'default' => env('DB_CONNECTION', 'sqlite'),  // Changed from 'mysql'

'connections' => [
    'sqlite' => [
        'driver' => 'sqlite',
        'database' => database_path('database.sqlite'),
        'prefix' => '',
        'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
    ],
    
    'bitcoin_sqlite' => [
        'driver' => 'sqlite',
        'database' => database_path('bitcoin.sqlite'),
        'prefix' => '',
        'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
    ],
    
    // Keep mysql, pgsql, sqlsrv for reference/backup
]
```

#### Task 2.2: Update `.env` File
- [ ] Set `DB_CONNECTION=sqlite`
- [ ] Ensure `database/database.sqlite` exists (create if needed: `touch database/database.sqlite`)
- [ ] Note: Bitcoin connection is hardcoded in config, no env vars needed

**Example `.env` changes:**
```env
DB_CONNECTION=sqlite
# MySQL settings can be removed or kept for reference
```

### Phase 3: Create Bitcoin Database

#### Task 3.1: Create Bitcoin Database File
- [ ] Create empty `database/bitcoin.sqlite` file
- [ ] Set appropriate file permissions

**Commands:**
```bash
touch database/bitcoin.sqlite
chmod 664 database/bitcoin.sqlite
```

**Note:** The file must exist before running migrations. Laravel will create the migrations table automatically.

### Phase 4: Model Configuration

#### Task 4.1: Update `app/Models/Coinbase.php`
- [ ] Add `protected $connection = 'bitcoin_sqlite';` property
- [ ] Verify existing `$guarded` and `$casts` remain intact

**Model Changes:**
```php
class Coinbase extends Model
{
    protected $connection = 'bitcoin_sqlite';  // NEW
    
    protected $guarded = [];
    
    protected $casts = [
        'amount' => 'float',
    ];
}
```

### Phase 5: Migration Management

#### Task 5.1: Run Bitcoin Migration
- [ ] Run migration on the bitcoin database connection
- [ ] Verify migration was successful

**Migration Command:**
```bash
php artisan migrate --database=bitcoin_sqlite --path=database/migrations/2021_02_08_215424_create_coinbases_table.php
```

**Verification:**
```bash
# Check migration was recorded
php artisan tinker
>>> DB::connection('bitcoin_sqlite')->table('migrations')->get()
>>> Schema::connection('bitcoin_sqlite')->hasTable('coinbases')
```

#### Task 5.2: Verify Migration Tracking
- [ ] Each database maintains its own `migrations` table
- [ ] Verify `bitcoin.sqlite` has `migrations` table
- [ ] Verify migration entry exists: `2021_02_08_215424_create_coinbases_table`

### Phase 6: Data Migration (If Needed)

#### Task 6.1: Check for Existing Bitcoin Data
- [ ] Determine if `coinbases` table exists in main database
- [ ] If yes, count records to migrate
- [ ] If no, skip to Phase 7

**Check Command:**
```bash
php artisan tinker
>>> DB::connection('sqlite')->table('coinbases')->count()
```

#### Task 6.2: Migrate Existing Bitcoin Data
**Only if `coinbases` table exists in main database with data:**

- [ ] Export existing data from main database
- [ ] Import data into bitcoin.sqlite
- [ ] Verify record counts match

**Migration Script (run in tinker or create artisan command):**
```php
// In php artisan tinker:
$oldData = DB::connection('sqlite')->table('coinbases')->get();
$count = $oldData->count();

if ($count > 0) {
    // Convert to array format for insert
    $insertData = $oldData->map(function($item) {
        return (array) $item;
    })->toArray();
    
    // Insert in chunks to avoid memory issues
    foreach (array_chunk($insertData, 100) as $chunk) {
        DB::connection('bitcoin_sqlite')->table('coinbases')->insert($chunk);
    }
    
    // Verify
    $newCount = DB::connection('bitcoin_sqlite')->table('coinbases')->count();
    echo "Migrated {$count} records. New database has {$newCount} records.\n";
}
```

**Or create a one-time artisan command:**
```bash
php artisan make:command MigrateBitcoinData
# Then implement the migration logic in the command
```

#### Task 6.3: Clean Up Old Data (After Verification)
- [ ] **Only after confirming new database works correctly**
- [ ] Drop `coinbases` table from main database
- [ ] Remove migration entry from main database's migrations table

**Cleanup Commands (run after verification):**
```bash
php artisan tinker
>>> Schema::connection('sqlite')->dropIfExists('coinbases')
>>> DB::connection('sqlite')->table('migrations')
    ->where('migration', '2021_02_08_215424_create_coinbases_table')
    ->delete()
```

### Phase 7: Testing & Verification

#### Task 7.1: Verify Controller Works
- [ ] Test `CoinbasePriceController@index` - should read from bitcoin.sqlite
- [ ] Test `CoinbasePriceController@storeCurrentPrice` - should write to bitcoin.sqlite
- [ ] Verify data appears in bitcoin database, not main database

**Test Commands:**
```bash
# Test reading
curl http://localhost/bitcoin-price

# Test writing (if route exists)
curl http://localhost/bitcoin-price/current

# Verify in database
php artisan tinker
>>> DB::connection('bitcoin_sqlite')->table('coinbases')->latest()->first()
>>> DB::connection('sqlite')->table('coinbases')->count()  // Should be 0 or old count
```

#### Task 7.2: Verify Job Works
- [ ] Test `CoinbasePricejob` - should write to bitcoin.sqlite
- [ ] Verify queue processing uses correct connection

**Test Commands:**
```bash
# Dispatch job
php artisan tinker
>>> dispatch(new \App\Jobs\CoinbasePricejob)

# Or if using queue
php artisan queue:work --once

# Verify data was written to bitcoin database
>>> DB::connection('bitcoin_sqlite')->table('coinbases')->latest()->first()
```

#### Task 7.3: Database Isolation Test
- [ ] Verify main app queries don't see bitcoin data
- [ ] Verify bitcoin queries don't see main app data
- [ ] Test that both databases can be queried independently

**Isolation Test:**
```bash
php artisan tinker
>>> // Main database should not have coinbases (or old data only)
>>> DB::connection('sqlite')->table('coinbases')->count()

>>> // Bitcoin database should have coinbases
>>> DB::connection('bitcoin_sqlite')->table('coinbases')->count()

>>> // Main database should have other tables
>>> Schema::connection('sqlite')->hasTable('users')
>>> Schema::connection('sqlite')->hasTable('nhtsa_decodeds')

>>> // Bitcoin database should NOT have other tables
>>> Schema::connection('bitcoin_sqlite')->hasTable('users')  // Should be false
```

### Phase 8: Documentation & Maintenance

#### Task 8.1: Backup Strategy
- [ ] Create backup script for both databases
- [ ] Document export/import procedures

**Backup Commands:**
```bash
# Create backups directory
mkdir -p backups

# Backup main database
cp database/database.sqlite backups/database_$(date +%Y%m%d).sqlite

# Backup bitcoin database
cp database/bitcoin.sqlite backups/bitcoin_$(date +%Y%m%d).sqlite
```

**Restore Commands:**
```bash
# Restore main database
cp backups/database_20240101.sqlite database/database.sqlite

# Restore bitcoin database
cp backups/bitcoin_20240101.sqlite database/bitcoin.sqlite
```

## Implementation Checklist

### Pre-Implementation
- [ ] Backup existing databases
- [ ] Check if `coinbases` table exists in current database
- [ ] Note record count if data exists
- [ ] Verify current `DB_CONNECTION` setting

### Core Implementation
- [ ] Update `config/database.php` (add bitcoin_sqlite connection, change default)
- [ ] Update `.env` file (set `DB_CONNECTION=sqlite`)
- [ ] Ensure `database/database.sqlite` exists (create if needed)
- [ ] Create `database/bitcoin.sqlite` file
- [ ] Update `app/Models/Coinbase.php` (add connection property)
- [ ] Run bitcoin migration on new database
- [ ] Migrate existing data (if applicable)
- [ ] Clean up old data from main database (after verification)

### Testing
- [ ] Test controller endpoints (read and write)
- [ ] Test job execution
- [ ] Verify database isolation
- [ ] Verify record counts match (if data was migrated)

### Post-Implementation
- [ ] Create backup scripts
- [ ] Verify git status (new files: `bitcoin.sqlite`, updated config/model)
- [ ] Commit changes

## Migration Commands Reference

### Main App Migrations
```bash
# Run all main app migrations (on default sqlite connection)
php artisan migrate

# Or explicitly specify connection
php artisan migrate --database=sqlite

# Rollback main app migrations
php artisan migrate:rollback --database=sqlite
```

### Bitcoin Migrations
```bash
# Run bitcoin migration
php artisan migrate --database=bitcoin_sqlite --path=database/migrations/2021_02_08_215424_create_coinbases_table.php

# Rollback bitcoin migration
php artisan migrate:rollback --database=bitcoin_sqlite --step=1

# Check migration status
php artisan migrate:status --database=bitcoin_sqlite
```

## File Structure After Implementation

```
database/
  ├── database.sqlite          # Main app database
  ├── bitcoin.sqlite           # Bitcoin prices database (NEW)
  ├── migrations/
  │   ├── [main app migrations]
  │   └── 2021_02_08_215424_create_coinbases_table.php  # Stays here, runs on bitcoin connection
  └── seeds/
```

**Note:** The migration file stays in the main migrations directory. The `--database` flag determines which database it runs on.

## Benefits

- ✅ **Complete Isolation**: Bitcoin data completely separate from main app
- ✅ **Easy Export**: Copy single file to export all price history
- ✅ **Portable**: Both databases are single files
- ✅ **Independent Backups**: Backup each database separately
- ✅ **No Cross-Database Queries**: Clean separation
- ✅ **Migration Flexibility**: Migrate each database independently

## Considerations

1. **Migration Tracking**: Each database maintains its own `migrations` table
2. **Database File Creation**: Must exist before running migrations
3. **Backup Strategy**: Both files need to be backed up
4. **Environment**: Default connection should be `sqlite`
5. **No Foreign Keys**: Can't have database-level relationships between databases (handle in application code if needed)

## Troubleshooting

### Issue: Migration fails with "database does not exist"
**Solution:** Ensure `database/bitcoin.sqlite` file exists before running migration
```bash
touch database/bitcoin.sqlite
```

### Issue: Model still using old database
**Solution:** Clear config cache
```bash
php artisan config:clear
php artisan cache:clear
```

### Issue: Job writes to wrong database
**Solution:** Verify model has `protected $connection = 'bitcoin_sqlite';` and clear queue
```bash
php artisan queue:clear
php artisan config:clear
```

### Issue: Can't find coinbases table after migration
**Solution:** Verify migration ran on correct connection
```bash
php artisan tinker
>>> DB::connection('bitcoin_sqlite')->table('migrations')->get()
>>> Schema::connection('bitcoin_sqlite')->hasTable('coinbases')
```

## Rollback Plan

If issues arise and you need to revert:

1. **Restore backups:**
   ```bash
   cp database/database.sqlite.backup database/database.sqlite
   ```

2. **Revert code changes:**
   - Revert `config/database.php` (remove bitcoin_sqlite, change default back)
   - Revert `app/Models/Coinbase.php` (remove connection property)
   - Revert `.env` (change DB_CONNECTION back)

3. **Clear caches:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

4. **If data was migrated:** Restore from backup or re-run migration on main database

## Notes

- The `CoinbasePricejob` will automatically use the correct connection via the model
- No changes needed to `CoinbasePriceController` - it uses the model
- Both databases use SQLite, so no additional drivers needed
- File-based databases make backups and exports trivial
- Each database maintains its own `migrations` table
- The migration file stays in main migrations directory; the `--database` flag determines where it runs
