#!/bin/bash

# Script pour vérifier la syntaxe Blade et nettoyer le cache

echo "==================================="
echo "Vérification Syntaxe Blade"
echo "==================================="

# Aller dans le répertoire du projet
cd /home/fobs/Desktop/Projects/FobsDev

echo ""
echo "1. Nettoyage du cache Blade..."
php artisan view:clear

echo ""
echo "2. Vérification des directives Blade dans layout.blade.php..."
echo ""

# Compter les @if et @endif
IF_COUNT=$(grep -c "@if" resources/views/layout.blade.php)
ENDIF_COUNT=$(grep -c "@endif" resources/views/layout.blade.php)

echo "   @if trouvés: $IF_COUNT"
echo "   @endif trouvés: $ENDIF_COUNT"

if [ $IF_COUNT -ne $ENDIF_COUNT ]; then
    echo "   ⚠️  PROBLÈME: Le nombre de @if et @endif ne correspond pas!"
fi

# Compter les @foreach et @endforeach
FOREACH_COUNT=$(grep -c "@foreach" resources/views/layout.blade.php)
ENDFOREACH_COUNT=$(grep -c "@endforeach" resources/views/layout.blade.php)

echo "   @foreach trouvés: $FOREACH_COUNT"
echo "   @endforeach trouvés: $ENDFOREACH_COUNT"

if [ $FOREACH_COUNT -ne $ENDFOREACH_COUNT ]; then
    echo "   ⚠️  PROBLÈME: Le nombre de @foreach et @endforeach ne correspond pas!"
fi

# Compter les @section et @endsection
SECTION_COUNT=$(grep -c "@section" resources/views/layout.blade.php)
ENDSECTION_COUNT=$(grep -c "@endsection" resources/views/layout.blade.php)

echo "   @section trouvés: $SECTION_COUNT"
echo "   @endsection trouvés: $ENDSECTION_COUNT"

echo ""
echo "3. Tentative de compilation Blade..."
php artisan view:cache 2>&1

if [ $? -eq 0 ]; then
    echo "✅ Compilation réussie!"
else
    echo "❌ Erreur de compilation détectée ci-dessus"
fi

echo ""
echo "4. Nettoyage final..."
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan cache:clear

echo ""
echo "==================================="
echo "Vérification terminée!"
echo "==================================="
