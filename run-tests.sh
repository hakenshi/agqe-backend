#!/bin/bash

echo "🧪 Running Laravel Tests..."
echo "=========================="

# Run all feature tests
php artisan test tests/Feature/Controllers/ --verbose

echo ""
echo "✅ Laravel tests completed!"