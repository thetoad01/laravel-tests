#!/bin/bash
# Quick fix for GitHub authentication

echo "GitHub Authentication Fix"
echo "========================="
echo ""

# Check for existing SSH keys
if [ -f ~/.ssh/id_ed25519.pub ]; then
    echo "✓ Found SSH key: id_ed25519.pub"
    SSH_KEY=~/.ssh/id_ed25519.pub
elif [ -f ~/.ssh/id_rsa.pub ]; then
    echo "✓ Found SSH key: id_rsa.pub"
    SSH_KEY=~/.ssh/id_rsa.pub
else
    echo "✗ No SSH key found"
    echo ""
    read -p "Generate a new SSH key? (y/n) " generate
    if [ "$generate" = "y" ] || [ "$generate" = "Y" ]; then
        read -p "Enter your GitHub email: " email
        ssh-keygen -t ed25519 -C "$email" -f ~/.ssh/id_ed25519 -N ""
        SSH_KEY=~/.ssh/id_ed25519.pub
        echo ""
        echo "✓ SSH key generated!"
    else
        echo "Skipping SSH key generation."
        echo "You'll need to use a Personal Access Token instead."
        exit 0
    fi
fi

if [ ! -z "$SSH_KEY" ]; then
    echo ""
    echo "Your public SSH key:"
    echo "-------------------"
    cat $SSH_KEY
    echo ""
    echo "-------------------"
    echo ""
    echo "Next steps:"
    echo "1. Copy the SSH key above (the entire output)"
    echo "2. Go to: https://github.com/settings/keys"
    echo "3. Click 'New SSH key'"
    echo "4. Paste the key and click 'Add SSH key'"
    echo ""
    read -p "Press Enter after you've added the key to GitHub..."
    
    # Switch to SSH
    echo ""
    echo "Switching repository to use SSH..."
    git remote set-url origin git@github.com:thetoad01/laravel-tests.git
    echo "✓ Switched to SSH!"
    echo ""
    echo "Testing connection..."
    ssh -T git@github.com 2>&1 | head -1
    echo ""
    echo "You can now use 'git push' without entering credentials!"
fi
