<footer class="site-footer">
    <main>
        <section class="footer-content">
            <!-- Insert Hub Here -->
            <!-- Insert About Tile Here -->
            <!-- Insert Newsletter Tile Here -->
            <!-- Insert Social Tile Here -->
            {{-- Footer Primary Menu --}}
            @if (has_nav_menu('footer_primary'))
            {!! wp_nav_menu([
                'theme_location' => 'footer_primary',
                'menu_class' => 'footer-menu footer-menu--primary',
                'container' => false,
                'fallback_cb' => false,
                'depth' => 1
            ]) !!}
            @endif
        </section>
    </main>
    
    <aside>
        {{-- Footer Secondary Menu --}}
        @if (has_nav_menu('footer_secondary'))
        {!! wp_nav_menu([
            'theme_location' => 'footer_secondary',
            'menu_class' => 'footer-menu footer-menu--secondary',
            'container' => false,
            'fallback_cb' => false,
            'depth' => 1
        ]) !!}
        @endif
        
        <span>&copy; 2025 Think Young Enterprises, LLC. All Rights Reserved</span>
    </aside>
    
    <div class="bg-image">
        <img src="http://bekindrewind.local/wp-content/uploads/2025/05/footer-bg-image.png" alt="BG Image">
    </div>
</footer>