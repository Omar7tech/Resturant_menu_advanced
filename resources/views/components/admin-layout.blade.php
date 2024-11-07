@props(['nav_title' => config('settings.name')])
<!doctype html>
<html data-theme="night">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</head>

<body>
    <x-nav.admin-main :$nav_title />
    <section id="main" class="p-3 md:p-5 lg:p-10">
        {{ $slot }}
    </section>

    <script>
        function updateCategory(productId, selectElement) {
            const categoryId = selectElement.value || null;

            fetch(`/admin/products/${productId}/update-category`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        category_id: categoryId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Category updated successfully!');
                    } else {
                        showToast('Failed to update category.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred.', 'error');
                });
        }

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastAlert = document.getElementById('toast-alert');
            toastAlert.classList.remove('alert-success', 'alert-error');
            toast.classList.remove('hidden');

            if (type === 'error') {
                toastAlert.classList.add('alert-error');
            } else {
                toastAlert.classList.add('alert-success');
            }

            toastAlert.querySelector('span').textContent = message;

            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }



        document.addEventListener('DOMContentLoaded', function() {
            const sortable = new Sortable(document.querySelector('#sortable-table tbody'), {
                animation: 150,
                onEnd: function(evt) {
                    // Handle drag and drop end event
                }
            });

            document.getElementById('save-sort').addEventListener('click', function() {
                const order = [];
                const rows = document.querySelectorAll('#sortable-table tbody tr');

                rows.forEach((row, index) => {
                    order.push({
                        id: row.getAttribute('data-id'),
                        sort: index + 1 // New sort order
                    });
                });

                // Send the order to the server
                fetch('{{ route('admin.save_order') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            order
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const toastContainer = document.createElement('div');
                            toastContainer.className = 'toast toast-end toast-bottom';
                            toastContainer.innerHTML = `
        <div class="alert alert-success">
            <span>Order saved successfully!</span>
        </div>
    `;

                            document.body.appendChild(toastContainer);

                            // Optionally, you can remove the toast after a few seconds
                            setTimeout(() => {
                                toastContainer.remove();
                            }, 3000); // Adjust the duration as needed
                        } else {
                            alert('Failed to save order.');
                        }

                    });
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const enabledCells = document.querySelectorAll('.toggle-enabled');
            const featuredCells = document.querySelectorAll('.toggle-featured');

            // Toggle enabled status
            enabledCells.forEach(cell => {
                cell.addEventListener('click', function() {
                    const categoryId = this.getAttribute('data-id');
                    const currentState = this.textContent.trim() === 'Yes';
                    const newState = !currentState;

                    // Update the UI immediately
                    this.textContent = newState ? 'Yes' : 'No';
                    this.classList.toggle('text-success', newState);
                    this.classList.toggle('text-error', !newState);

                    // Send AJAX request to update the state in the database
                    fetch(`/admin/categories/${categoryId}/toggle-enabled`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                            },
                            body: JSON.stringify({
                                enabled: newState
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to update');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // Revert UI change if the request fails
                            this.textContent = currentState ? 'Yes' : 'No';
                            this.classList.toggle('text-success', currentState);
                            this.classList.toggle('text-error', !currentState);
                        });
                });
            });

            // Toggle featured status
            featuredCells.forEach(cell => {
                cell.addEventListener('click', function() {
                    const categoryId = this.getAttribute('data-id');
                    const currentState = this.textContent.trim() === 'Yes';
                    const newState = !currentState;

                    // Update the UI immediately
                    this.textContent = newState ? 'Yes' : 'No';
                    this.classList.toggle('text-success', newState);
                    this.classList.toggle('text-error', !newState);

                    // Send AJAX request to update the state in the database
                    fetch(`/admin/categories/${categoryId}/toggle-featured`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                            },
                            body: JSON.stringify({
                                featured: newState
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to update');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // Revert UI change if the request fails
                            this.textContent = currentState ? 'Yes' : 'No';
                            this.classList.toggle('text-success', currentState);
                            this.classList.toggle('text-error', !currentState);
                        });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const statusCells = document.querySelectorAll('.toggle-status');

            // Add click event listener to each "Enabled" or "Featured" cell
            statusCells.forEach(cell => {
                cell.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    const type = this.getAttribute('data-type');
                    const currentState = this.textContent.trim() === 'Yes';

                    // Update UI optimistically
                    const newState = !currentState;
                    this.textContent = newState ? 'Yes' : 'No';
                    this.classList.toggle('text-success', newState);
                    this.classList.toggle('text-error', !newState);

                    // Send AJAX request to update status
                    fetch(`/admin/products/${productId}/toggle-${type}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                [type]: newState
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.success) {
                                this.textContent = currentState ? 'Yes' : 'No';
                                this.classList.toggle('text-success', currentState);
                                this.classList.toggle('text-error', !currentState);
                                showToast('Failed to update status.', 'error');
                            } else {
                                showToast(
                                    `${type.charAt(0).toUpperCase() + type.slice(1)} updated successfully!`
                                    );
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            this.textContent = currentState ? 'Yes' : 'No';
                            this.classList.toggle('text-success', currentState);
                            this.classList.toggle('text-error', !currentState);
                            showToast('An error occurred.', 'error');
                        });
                });
            });
        });

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastAlert = document.getElementById('toast-alert');
            toastAlert.classList.remove('alert-success', 'alert-error');
            toast.classList.remove('hidden');

            if (type === 'error') {
                toastAlert.classList.add('alert-error');
            } else {
                toastAlert.classList.add('alert-success');
            }

            toastAlert.querySelector('span').textContent = message;

            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>

</html>
