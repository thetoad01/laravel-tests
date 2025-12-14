# Cleanup Plan: Remove COVID19 and Processpro Inventory

## Overview
This document outlines the plan to completely remove all references and artifacts related to COVID19 data and Processpro inventory from the project.

## Current State Analysis

### COVID19 References Found
- ✅ **Migration File**: `database/migrations/2021_01_03_023400_create_covid19s_table.php`
- ✅ **Database Table**: `covid19s` (if migration has been run)
- ❌ **No Controllers** found
- ❌ **No Models** found
- ❌ **No Routes** found
- ❌ **No Views** found
- ❌ **No Seeders** found
- ❌ **No Factories** found

### Processpro Inventory References Found
- ✅ **Migration File**: `database/migrations/2019_10_10_181246_create_processpro_inventory_table.php`
- ✅ **Database Table**: `processpro_inventory` (if migration has been run)
- ✅ **Model Directory**: `app/Models/Processpro/` (directory may still exist even though `InventoryModel.php` was deleted)
- ❌ **No Controllers** found
- ❌ **No Routes** found
- ❌ **No Views** found
- ❌ **No Seeders** found
- ❌ **No Factories** found

## Cleanup Tasks

### Phase 1: Remove Migration Files
- [x] Delete `database/migrations/2021_01_03_023400_create_covid19s_table.php`
- [x] Delete `database/migrations/2019_10_10_181246_create_processpro_inventory_table.php`

### Phase 2: Remove Model Directory (if empty)
- [ ] Check if `app/Models/Processpro/` directory exists
- [ ] If directory exists and is empty, delete `app/Models/Processpro/` directory
- [ ] If directory contains other files, review and keep only what's needed

### Phase 3: Database Cleanup
- [ ] **If using SQLite**: Check `database/database.sqlite` for tables
  - [ ] Drop `covid19s` table if it exists
  - [ ] Drop `processpro_inventory` table if it exists
- [ ] **If using MySQL/PostgreSQL**: 
  - [ ] Run migration rollback: `php artisan migrate:rollback --step=1` (for each migration)
  - [ ] Or manually drop tables via database client
- [ ] **Verify**: Check that tables no longer exist in database

### Phase 4: Migration History Cleanup
- [ ] Check `migrations` table in database
- [ ] Remove entries for:
  - `2021_01_03_023400_create_covid19s_table`
  - `2019_10_10_181246_create_processpro_inventory_table`
- [ ] This can be done via SQL: 
  ```sql
  DELETE FROM migrations WHERE migration = '2021_01_03_023400_create_covid19s_table';
  DELETE FROM migrations WHERE migration = '2019_10_10_181246_create_processpro_inventory_table';
  ```

### Phase 5: Final Verification
- [ ] Search codebase for any remaining references:
  ```bash
  grep -r -i "covid19" .
  grep -r -i "processpro" .
  grep -r -i "processpro_inventory" .
  ```
- [ ] Verify no routes reference these features
- [ ] Verify no views reference these features
- [ ] Verify no tests reference these features
- [ ] Check `.gitignore` - no special handling needed (migrations are tracked)

## Implementation Steps

### Step 1: Backup (Optional but Recommended)
```bash
# Backup database before cleanup
cp database/database.sqlite database/database.sqlite.backup
# Or for MySQL/PostgreSQL, create a database dump
```

### Step 2: Remove Migration Files
```bash
rm database/migrations/2021_01_03_023400_create_covid19s_table.php
rm database/migrations/2019_10_10_181246_create_processpro_inventory_table.php
```

### Step 3: Remove Model Directory (if exists and empty)
```bash
# Check if directory exists and is empty
ls -la app/Models/Processpro/
# If empty, remove it
rmdir app/Models/Processpro/
```

### Step 4: Clean Database Tables
**For SQLite:**
```bash
sqlite3 database/database.sqlite
# Then in SQLite prompt:
DROP TABLE IF EXISTS covid19s;
DROP TABLE IF EXISTS processpro_inventory;
DELETE FROM migrations WHERE migration = '2021_01_03_023400_create_covid19s_table';
DELETE FROM migrations WHERE migration = '2019_10_10_181246_create_processpro_inventory_table';
.exit
```

**For MySQL:**
```bash
php artisan tinker
# Then in Tinker:
DB::statement('DROP TABLE IF EXISTS covid19s');
DB::statement('DROP TABLE IF EXISTS processpro_inventory');
DB::table('migrations')->where('migration', '2021_01_03_023400_create_covid19s_table')->delete();
DB::table('migrations')->where('migration', '2019_10_10_181246_create_processpro_inventory_table')->delete();
```

### Step 5: Verify Cleanup
```bash
# Search for any remaining references
grep -r -i "covid19" app/ database/ routes/ resources/
grep -r -i "processpro" app/ database/ routes/ resources/
```

## Notes
- The `InventoryModel.php` file was already deleted (visible in git status)
- No active code references these features, so cleanup should be straightforward
- Migration files are the primary artifacts remaining
- Database tables may or may not exist depending on whether migrations were run

## Risk Assessment
- **Low Risk**: No active code references these features
- **Data Loss**: Any existing data in these tables will be lost (intentional)
- **Rollback**: If needed, migration files can be restored from git history

## Completion Criteria
- [ ] All migration files removed
- [ ] All database tables dropped
- [ ] Migration history cleaned
- [ ] Model directories cleaned (if applicable)
- [ ] No references found in codebase search
- [ ] Git commit with cleanup changes
