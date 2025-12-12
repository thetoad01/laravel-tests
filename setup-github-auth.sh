#!/bin/bash
# GitHub Authentication Setup Script
# This script helps you set up authentication for GitHub

echo "GitHub Authentication Setup"
echo "============================"
echo ""

# Check current remote URL
echo "Current remote URL:"
git remote -v
echo ""

# Check for SSH keys
echo "Checking for SSH keys..."
if [ -f ~/.ssh/id_rsa.pub ] || [ -f ~/.ssh/id_ed25519.pub ]; then
    echo "✓ SSH key found!"
    if [ -f ~/.ssh/id_ed25519.pub ]; then
        SSH_KEY_FILE=~/.ssh/id_ed25519.pub
    else
        SSH_KEY_FILE=~/.ssh/id_rsa.pub
    fi
    
    echo ""
    echo "Your public SSH key:"
    cat $SSH_KEY_FILE
    echo ""
    echo "To use SSH authentication:"
    echo "1. Copy the SSH key above"
    echo "2. Go to: https://github.com/settings/keys"
    echo "3. Click 'New SSH key', paste the key, and save"
    echo "4. Then run: git remote set-url origin git@github.com:thetoad01/laravel-tests.git"
    echo ""
    read -p "Do you want to switch to SSH authentication now? (y/n) " switch_ssh
    if [ "$switch_ssh" = "y" ] || [ "$switch_ssh" = "Y" ]; then
        git remote set-url origin git@github.com:thetoad01/laravel-tests.git
        echo "✓ Switched to SSH authentication"
        git remote -v
    fi
else
    echo "✗ No SSH key found"
    echo ""
    read -p "Do you want to generate an SSH key? (y/n) " generate_key
    if [ "$generate_key" = "y" ] || [ "$generate_key" = "Y" ]; then
        read -p "Enter your GitHub email: " github_email
        ssh-keygen -t ed25519 -C "$github_email" -f ~/.ssh/id_ed25519 -N ""
        echo ""
        echo "✓ SSH key generated!"
        echo ""
        echo "Your public SSH key:"
        cat ~/.ssh/id_ed25519.pub
        echo ""
        echo "Next steps:"
        echo "1. Copy the SSH key above"
        echo "2. Go to: https://github.com/settings/keys"
        echo "3. Click 'New SSH key', paste the key, and save"
        echo "4. Then run: git remote set-url origin git@github.com:thetoad01/laravel-tests.git"
    else
        echo ""
        echo "For HTTPS authentication with Personal Access Token:"
        echo "1. Go to: https://github.com/settings/tokens"
        echo "2. Generate new token (classic) with 'repo' scope"
        echo "3. Copy the token"
        echo "4. When Git prompts for password, paste the token"
    fi
fi

echo ""
echo "To test authentication, try:"
echo "  git fetch"
