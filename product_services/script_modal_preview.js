
        document.addEventListener('DOMContentLoaded', function () {
            // Add event listener to the preview buttons
            document.querySelectorAll('.preview-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const imgs = this.getAttribute('data-imgs').split(',');
                    const title = this.getAttribute('data-title');
                    const desc = this.getAttribute('data-desc');

                    // Set the modal title and description
                    document.getElementById('modalPizzaTitle').textContent = title;
                    document.getElementById('modalPizzaDesc').textContent = desc;

                    // Set up carousel images
                    const carouselInner = document.getElementById('carouselImages');
                    carouselInner.innerHTML = ''; // Clear previous images

                    imgs.forEach((img, index) => {
                        const isActive = index === 0 ? 'active' : '';
                        carouselInner.innerHTML += `
                            <div class="carousel-item ${isActive}">
                                <img src="${img}" class="d-block w-100" alt="${title}">
                            </div>
                        `;
                    });
                });
            });
        });