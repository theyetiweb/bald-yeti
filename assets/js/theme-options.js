(() => {
  function addBlockTooltips() {
    const inputs = document.querySelectorAll('input[name^="carbon_fields_compact_input[_gutenberg_allowed_blocks]"]');

    // biome-ignore lint/complexity/noForEach: <explanation>
    inputs.forEach((input) => {
      const label = document.querySelector(`label[for="${input.id}"]`);
      const blockName = input.value;
  
      // Icon
      const iconName = blockName.substring(blockName.lastIndexOf('/') + 1)
      const iconHtml = `<i class="blockicon blockicon-${iconName}"></i>`

      // Label
      const labelText = label.textContent;
      label.innerHTML = `<span class="icon">${iconHtml}</span><span class="title">${labelText}</span>`
  
      // Tooltip
      const tooltip = document.createElement('div');
      tooltip.id = `tooltip-${blockName}`;
      tooltip.classList.add('tooltip');
      tooltip.role = 'tooltip';
      tooltip.innerHTML = `
        <header>
          <div class="icon">
            ${iconHtml}
          </div>
          <div class="title">
            <h4>${blockName}</h4>
          </div>
        </header>
      `;
  
      // Get block info
      fetch(`/wp-json/bald-yeti/v1/block-info/${blockName}`)
        .then((response) => response.json())
        .then((blockInfo) => {
          const description = document.createElement('p');
          description.textContent = blockInfo.description || 'No description';
          if (blockInfo.icon) {
            if (blockInfo.icon.includes('<svg')) {
              const icon = document.createElement('div');
              icon.style.width = '36px';
              icon.style.height = '36px';
              icon.innerHTML = blockInfo.icon;
              label.querySelector('.icon').innerHTML = icon.outerHTML;
              tooltip.querySelector('header .icon').innerHTML = icon.outerHTML;
            } else if (typeof blockInfo.icon === 'string') {
              label.querySelector('.icon i').classList.remove(`blockicon-${blockName}`);
              label.querySelector('.icon i').classList.add(`blockicon-${blockInfo.icon}`);
              tooltip.querySelector('header i').classList.remove(`blockicon-${blockName}`);
              tooltip.querySelector('header i').classList.add(`blockicon-${blockInfo.icon}`);
            }
          }
          if (blockInfo.title) {
            label.querySelector('.title').textContent = blockInfo.title;
            tooltip.querySelector('h4').textContent = blockInfo.title;
            const blockNameSpan = document.createElement('small');
            blockNameSpan.textContent = blockName;
            tooltip.querySelector('header > .title').appendChild(blockNameSpan);
          }
          tooltip.appendChild(description);
          label.appendChild(tooltip);
        });
    });
  }
  
  window.addEventListener('load', () => addBlockTooltips())
  
})();