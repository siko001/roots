import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  const {default: Header} = await import('./components/header');
  const {default: Slider} = await import('./blocks/slider');
  const {default: FeaturedProductSlider} = await import('./blocks/featuredProductSlider');
  new Header();
  new Slider();
  new FeaturedProductSlider();
 
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
