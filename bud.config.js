/**
 * Bud.js Compiler Configuration
 *
 * @see https://roots.io/sage/docs
 * @see https://bud.js.org/learn/config
 */

export default async (app) => {
    // Define aliases for easier imports
    app.alias('@blocks', app.path('resources/blocks'));

    // Define entry points for assets
    app
        .entry('app', ['@scripts/app', '@styles/app'])
        .entry('editor', ['@scripts/editor', '@styles/editor'])
        .assets(['images']);

    // Set the public path for compiled assets
    app.setPublicPath('/wp-content/themes/sage/public/');

    // Configure development server
    app
        .setUrl('http://localhost:3000')
        .setProxyUrl('https://bekindrewind.local')
        .watch(['resources/views/**/*', 'app/**/*', 'resources/styles/**/*']);
};