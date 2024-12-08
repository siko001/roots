import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  const {default: Header} = await import('./components/header');
  const {default: Slider} = await import('./blocks/slider');
  const {default: ProductsSlider} = await import('./components/products-slider');
  new Header();
  new Slider();
  new ProductsSlider();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
