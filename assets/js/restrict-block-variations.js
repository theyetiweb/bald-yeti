(() => {
  async function unregisterEmbedVariations() {
      const response = await fetch("/wp-json/bald-yeti/v1/embed-variations");
      const allowedVariations = await response.json();
      const allVariations = wp.blocks.getBlockVariations('core/embed');
      // biome-ignore lint/complexity/noForEach: <explanation>
      const disallowed = allVariations.forEach( (variation) => {
        if ( !allowedVariations.includes( variation.name ) ) {
          wp.blocks.unregisterBlockVariation( 'core/embed', variation.name );
        }
      });
      return disallowed;
  }
  document.addEventListener('DOMContentLoaded', () => {
    if (wp.blocks && typeof wp.blocks.unregisterBlockVariation === 'function') {
      wp.domReady( unregisterEmbedVariations )
    }
  })
})();