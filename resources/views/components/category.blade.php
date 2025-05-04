@props(['category'])

<a href="{{ get_category_link($category->term_id) }}" class="category-tag">
  {{ $category->name }}
</a>