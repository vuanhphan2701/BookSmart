<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Demo - Pages 1-3</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .book-container {
            perspective: 1500px;
            width: 800px;
            height: 600px;
            position: relative;
        }

        .book {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 1s;
        }

        .page {
            position: absolute;
            width: 50%;
            height: 100%;
            top: 0;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
            box-sizing: border-box;
            overflow-y: auto;
            backface-visibility: hidden;
            border: 1px solid #ddd;
        }

        .page-left {
            left: 0;
            border-radius: 5px 0 0 5px;
            transform-origin: right center;
        }

        .page-right {
            left: 50%;
            border-radius: 0 5px 5px 0;
            transform-origin: left center;
        }

        .page-content {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .page-number {
            position: absolute;
            bottom: 10px;
            right: 20px;
            font-size: 12px;
            color: #777;
        }

        .cover {
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .cover h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .cover p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .navigation {
            position: absolute;
            bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background: #2989d8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        button:hover {
            background: #1e5799;
        }

        button:disabled {
            background: #cccccc;
            cursor: not-allowed;
        }

        h2 {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-top: 0;
        }

        .page-text {
            flex-grow: 1;
        }
    </style>
</head>

<body>
    <div class="book-container">
        <div class="book" id="book">
            <!-- Cover -->
            <div class="page page-left cover" id="cover" style="background-image: url('view/JS/img/<?= $lists[0]->getImage() ?>');">
                <div class="page-content">
                </div>
            </div>

            <!-- Page 1 (right side) -->
            <div class="page page-right" id="page1">
                <div class="page-content">
                    <h2>Chapter 1: Introduction</h2>
                    <div class="page-text">
                        <p>Welcome to this book demonstration. This is page 1 of our sample book.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.</p>
                        <p>In this chapter, we'll explore the basics of creating a book-like interface using HTML, CSS, and JavaScript.</p>
                    </div>
                    <div class="page-number">1</div>
                </div>
            </div>

            <!-- Page 2 (left side) -->
            <div class="page page-left" id="page2">
                <div class="page-content">
                    <h2>Chapter 1: Continued</h2>
                    <div class="page-text">
                        <p>This is page 2 of our demonstration. The text continues here from the previous page.</p>
                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl.</p>
                        <p>Notice how the pages turn like a real book. This effect is created using CSS 3D transforms and JavaScript event handlers.</p>
                    </div>
                    <div class="page-number">2</div>
                </div>
            </div>

            <!-- Page 3 (right side) -->
            <div class="page page-right" id="page3">
                <div class="page-content">
                    <h2>Chapter 2: Advanced Topics</h2>
                    <div class="page-text">
                        <p>Now we're on page 3, which begins Chapter 2 of our demonstration book.</p>
                        <p>Morbi euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Nullam auctor, nisl eget ultricies tincidunt.</p>
                        <p>You can continue adding more pages by following the same pattern, or implement a dynamic solution that loads content as needed.</p>
                    </div>
                    <div class="page-number">3</div>
                </div>
            </div>
        </div>

        <div class="navigation">
            <button id="prevBtn" disabled>Previous</button>
            <button id="nextBtn">Next</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const book = document.getElementById('book');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            let currentPage = 0;
            const totalPages = 3; // Cover + 3 content pages (but cover is page 0)

            // Array of page elements in the order they appear in the book
            const pages = [
                document.getElementById('cover'),
                document.getElementById('page1'),
                document.getElementById('page2'),
                document.getElementById('page3')
            ];

            // Initialize pages
            function initPages() {
                // Hide all pages except the cover
                for (let i = 1; i < pages.length; i++) {
                    pages[i].style.display = 'none';
                }
                pages[0].style.display = 'block';
            }

            // Turn to a specific page
            function goToPage(pageIndex) {
                if (pageIndex < 0 || pageIndex >= pages.length) return;

                // Update current page
                currentPage = pageIndex;

                // Update button states
                prevBtn.disabled = (currentPage === 0);
                nextBtn.disabled = (currentPage === pages.length - 1);

                // Hide all pages
                pages.forEach(page => {
                    page.style.display = 'none';
                    page.style.transform = '';
                    page.style.zIndex = '';
                });

                // Show current page and adjacent pages for turning effect
                if (currentPage === 0) {
                    // Cover page
                    pages[0].style.display = 'block';
                    pages[0].style.zIndex = '10';

                    if (pages.length > 1) {
                        pages[1].style.display = 'block';
                        pages[1].style.zIndex = '5';
                    }
                } else if (currentPage === pages.length - 1) {
                    // Last page
                    pages[currentPage].style.display = 'block';
                    pages[currentPage].style.zIndex = '10';

                    if (currentPage > 0) {
                        pages[currentPage - 1].style.display = 'block';
                        pages[currentPage - 1].style.zIndex = '5';
                    }
                } else {
                    // Middle pages
                    pages[currentPage].style.display = 'block';
                    pages[currentPage].style.zIndex = '10';

                    pages[currentPage + 1].style.display = 'block';
                    pages[currentPage + 1].style.zIndex = '5';

                    if (currentPage > 0) {
                        pages[currentPage - 1].style.display = 'block';
                        pages[currentPage - 1].style.zIndex = '1';
                    }
                }
            }

            // Next page
            function nextPage() {
                if (currentPage < pages.length - 1) {
                    // Animate page turn
                    if (currentPage % 2 === 0) {
                        // Turning a right page (odd numbered page to user)
                        const currentRightPage = pages[currentPage + 1];
                        currentRightPage.style.transform = 'rotateY(-150deg)';

                        setTimeout(() => {
                            currentRightPage.style.transform = '';
                            goToPage(currentPage + 1);
                        }, 500);
                    } else {
                        // Turning a left page (even numbered page to user)
                        const currentLeftPage = pages[currentPage];
                        currentLeftPage.style.transform = 'rotateY(150deg)';

                        setTimeout(() => {
                            currentLeftPage.style.transform = '';
                            goToPage(currentPage + 1);
                        }, 500);
                    }
                }
            }

            // Previous page
            function prevPage() {
                if (currentPage > 0) {
                    // Animate page turn
                    if (currentPage % 2 === 0) {
                        // Turning back a right page (odd numbered page to user)
                        const currentRightPage = pages[currentPage - 1];
                        currentRightPage.style.transform = 'rotateY(30deg)';

                        setTimeout(() => {
                            currentRightPage.style.transform = '';
                            goToPage(currentPage - 1);
                        }, 500);
                    } else {
                        // Turning back a left page (even numbered page to user)
                        const currentLeftPage = pages[currentPage];
                        currentLeftPage.style.transform = 'rotateY(-30deg)';

                        setTimeout(() => {
                            currentLeftPage.style.transform = '';
                            goToPage(currentPage - 1);
                        }, 500);
                    }
                }
            }

            // Event listeners
            nextBtn.addEventListener('click', nextPage);
            prevBtn.addEventListener('click', prevPage);

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowRight') {
                    nextPage();
                } else if (e.key === 'ArrowLeft') {
                    prevPage();
                }
            });

            // Initialize
            initPages();
        });
    </script>
</body>

</html>
