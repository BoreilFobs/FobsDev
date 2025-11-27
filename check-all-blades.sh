#!/bin/bash

echo "Vérification des directives Blade dans toutes les vues..."
echo ""

find resources/views -name "*.blade.php" -type f | while read file; do
    echo "Fichier: $file"
    
    # Compter @if et @endif
    if_count=$(grep -o "@if" "$file" | wc -l)
    endif_count=$(grep -o "@endif" "$file" | wc -l)
    
    # Compter @foreach et @endforeach  
    foreach_count=$(grep -o "@foreach" "$file" | wc -l)
    endforeach_count=$(grep -o "@endforeach" "$file" | wc -l)
    
    # Compter @section et @endsection
    section_count=$(grep -o "@section" "$file" | wc -l)
    endsection_count=$(grep -o "@endsection" "$file" | wc -l)
    
    has_issue=false
    
    if [ $if_count -ne $endif_count ]; then
        echo "  ⚠️  @if: $if_count  @endif: $endif_count"
        has_issue=true
    fi
    
    if [ $foreach_count -ne $endforeach_count ]; then
        echo "  ⚠️  @foreach: $foreach_count  @endforeach: $endforeach_count"
        has_issue=true
    fi
    
    if [ $section_count -ne $endsection_count ]; then
        echo "  ⚠️  @section: $section_count  @endsection: $endsection_count"
        has_issue=true
    fi
    
    if [ "$has_issue" = false ]; then
        echo "  ✅ OK"
    fi
    
    echo ""
done

echo "Vérification terminée!"
