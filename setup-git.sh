#!/bin/bash
# Git Setup Script for Laravel Tests Repository
# Run this script in WSL to configure Git properly

echo "Setting up Git configuration..."
echo ""

# 1. Set Git user name (if not already set)
if [ -z "$(git config --global user.name)" ]; then
    echo "1. Setting Git user name..."
    read -p "Enter your Git user name: " git_name
    if [ ! -z "$git_name" ]; then
        git config --global user.name "$git_name"
        echo "✓ Git user name set to: $git_name"
    fi
else
    echo "✓ Git user name already set: $(git config --global user.name)"
fi

# 2. Set Git user email (if not already set)
if [ -z "$(git config --global user.email)" ]; then
    echo ""
    echo "2. Setting Git user email..."
    read -p "Enter your Git email: " git_email
    if [ ! -z "$git_email" ]; then
        git config --global user.email "$git_email"
        echo "✓ Git user email set to: $git_email"
    fi
else
    echo "✓ Git user email already set: $(git config --global user.email)"
fi

# 3. Verify configuration
echo ""
echo "3. Current Git configuration:"
git config --global --list | grep -E "user\.|safe\.directory" || echo "No additional config found"

# 4. Test repository access
echo ""
echo "4. Testing repository access..."
cd ~/Websites/laravel-tests
if git status > /dev/null 2>&1; then
    echo "✓ Git repository is accessible!"
    git status
else
    echo "✗ Error accessing repository"
    git status
fi

# 5. Check remote configuration
echo ""
echo "5. Remote repository configuration:"
git remote -v

echo ""
echo "Next steps for GitHub authentication:"
echo "1. If using HTTPS, you'll need a GitHub Personal Access Token (PAT)"
echo "   - Go to: https://github.com/settings/tokens"
echo "   - Generate a new token with 'repo' scope"
echo "   - Use the token as your password when pushing/pulling"
echo ""
echo "2. Or switch to SSH authentication (if you have SSH keys):"
echo "   git remote set-url origin git@github.com:thetoad01/laravel-tests.git"
echo ""
