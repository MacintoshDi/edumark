document.addEventListener('DOMContentLoaded', () => {

    // 1. Mobile Sidebar
    const hamburgerButton = document.querySelector('#hamburger-button');
    const mobileSidebar = document.querySelector('#mobile-sidebar');
    const sidebarCloseButton = document.querySelector('#sidebar-close-button');
    const sidebarOverlay = document.querySelector('#sidebar-overlay');

    const toggleSidebar = () => {
        if (!mobileSidebar || !sidebarOverlay) return;
        const isOpen = !mobileSidebar.classList.contains('-translate-x-full');
        if (isOpen) {
            mobileSidebar.classList.remove('translate-x-0');
            mobileSidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('overflow-hidden');
        } else {
            mobileSidebar.classList.remove('-translate-x-full');
            mobileSidebar.classList.add('translate-x-0');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
            document.body.classList.add('overflow-hidden');
        }
    };

    if (hamburgerButton && mobileSidebar && sidebarCloseButton && sidebarOverlay) {
        hamburgerButton.addEventListener('click', toggleSidebar);
        sidebarCloseButton.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);
    }

    // 2. Header Dropdown Mega Menus
    const dropdownButtons = document.querySelectorAll('[data-dropdown-button]');
    const allMenus = document.querySelectorAll('[data-dropdown-menu]');
    let openMenu = null;

    dropdownButtons.forEach(button => {
        const menuId = button.getAttribute('data-dropdown-button');
        const menu = document.getElementById(menuId);
        const arrow = button.querySelector('svg:last-child');

        if (!menu) return;
        
        button.addEventListener('click', (e) => {
            e.stopPropagation();
            
            if (openMenu === menu) {
                // Clicked the same button, so close it
                menu.classList.add('hidden');
                if (arrow) arrow.style.transform = 'rotate(0deg)';
                openMenu = null;
            } else {
                // A different button was clicked, or no menu is open
                // Hide all menus first
                allMenus.forEach(m => m.classList.add('hidden'));
                dropdownButtons.forEach(b => {
                    const bArrow = b.querySelector('svg:last-child');
                    if(bArrow) bArrow.style.transform = 'rotate(0deg)';
                });

                // Open the new menu
                menu.classList.remove('hidden');
                if (arrow) arrow.style.transform = 'rotate(180deg)';
                openMenu = menu;
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (openMenu && !openMenu.contains(e.target)) {
            const openButton = document.querySelector(`[data-dropdown-button="${openMenu.id}"]`);
            if (openButton && !openButton.contains(e.target)) {
                openMenu.classList.add('hidden');
                const arrow = openButton.querySelector('svg:last-child');
                if (arrow) arrow.style.transform = 'rotate(0deg)';
                openMenu = null;
            }
        }
    });

    // 3. Generic Tabs Component Logic
    const tabContainers = document.querySelectorAll('[data-tab-container]');
    tabContainers.forEach(container => {
        const tabs = container.querySelectorAll('[data-tab]');
        const panels = container.querySelectorAll('[data-tab-panel]');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const targetPanelId = tab.getAttribute('data-tab-target');
                
                tabs.forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                });
                
                panels.forEach(p => {
                    p.classList.add('hidden');
                });

                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                
                const targetPanel = container.querySelector(`#${targetPanelId}`);
                targetPanel?.classList.remove('hidden');
            });
        });
    });
    
    // 4. Showcase Modal Logic
    const modal = document.querySelector('#showcase-modal');
    if(modal) {
        const modalTriggers = document.querySelectorAll('[data-modal-trigger]');
        const modalCloseButtons = modal.querySelectorAll('[data-modal-close]');
        const modalImage = modal.querySelector('#modal-image');
        const modalTitle = modal.querySelector('#modal-title');
        const modalAuthor = modal.querySelector('#modal-author');
        const modalAvatar = modal.querySelector('#modal-avatar');
        const modalDescription = modal.querySelector('#modal-description');
        const modalTagsContainer = modal.querySelector('#modal-tags');
        const modalLikes = modal.querySelector('#modal-likes');
        const modalComments = modal.querySelector('#modal-comments');

        const openModal = (data) => {
            if (!data) return;

            // Populate modal content
            if(modalImage) modalImage.src = data.image;
            if(modalTitle) modalTitle.textContent = data.title;
            if(modalAuthor) modalAuthor.textContent = data.author;
            if(modalAvatar) modalAvatar.src = data.avatar;
            if(modalDescription) modalDescription.textContent = data.description;
            if(modalLikes) modalLikes.textContent = `Like (${data.likes})`;
            if(modalComments) modalComments.textContent = `${data.comments} Comments`;

            if(modalTagsContainer) {
                modalTagsContainer.innerHTML = ''; // Clear existing tags
                data.tags.forEach(tagText => {
                    const tagEl = document.createElement('span');
                    tagEl.className = 'tag bg-gray-100 text-gray-800';
                    tagEl.textContent = tagText;
                    modalTagsContainer.appendChild(tagEl);
                });
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        };

        const closeModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        };

        modalTriggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                try {
                    const data = JSON.parse(trigger.getAttribute('data-modal-data') || '{}');
                    openModal(data);
                } catch(e) {
                    console.error("Failed to parse modal data:", e);
                }
            });
        });

        modalCloseButtons.forEach(btn => btn.addEventListener('click', closeModal));

        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === "Escape" && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    }
});