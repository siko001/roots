/**
 * @see {@link https://bud.js.org/extensions/bud-preset-wordpress/editor-integration/filters}
 */
roots.register.filters('@scripts/filters');

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

const {default: Slider} = await import('./blocks/slider');
const {default: ProductsSlider} = await import('./components/products-slider');

new Slider();
new ProductsSlider();