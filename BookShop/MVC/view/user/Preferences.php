<main class="main">
    <!--==================== UPDATE PREFERENCES ====================-->
    <section class="update-preferences">
        <div class="update-preferences__container">
            <header class="update-preferences__header">
                <h2 class="update-preferences__title">Update Preferences</h2>
                <p class="update-preferences__subtitle">
                    Customize your bookstore settings and notifications.
                </p>
            </header>
            <form class="update-preferences__form">
                <div class="form-group">
                    <label for="notification-frequency">Notification Frequency</label>
                    <select id="notification-frequency" name="notification-frequency">
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="never">Never</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="genre-preferences">Genre Preferences</label>
                    <select id="genre-preferences" name="genre-preferences" multiple>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="mystery">Mystery</option>
                        <option value="science-fiction">Science Fiction</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="romance">Romance</option>
                        <option value="horror">Horror</option>
                        <option value="biography">Biography</option>
                        <option value="history">History</option>
                        <option value="self-help">Self-Help</option>
                        <option value="thriller">Thriller</option>
                        <option value="adventure">Adventure</option>
                        <option value="crime">Crime</option>
                        <option value="drama">Drama</option>
                        <option value="poetry">Poetry</option>
                        <option value="comedy">Comedy</option>
                        <option value="graphic-novel">Graphic Novel</option>
                        <option value="young-adult">Young Adult</option>
                        <option value="children">Children</option>
                        <option value="travel">Travel</option>
                        <option value="cooking">Cooking</option>
                        <option value="art">Art</option>
                        <option value="science">Science</option>
                        <option value="philosophy">Philosophy</option>
                        <option value="psychology">Psychology</option>
                        <option value="religion">Religion</option>
                        <option value="politics">Politics</option>
                        <option value="economics">Economics</option>
                        <option value="business">Business</option>
                        <option value="technology">Technology</option>
                        <option value="health">Health</option>
                        <option value="fitness">Fitness</option>
                        <option value="sports">Sports</option>
                        <option value="music">Music</option>
                        <option value="film">Film</option>
                        <option value="theater">Theater</option>
                        <option value="education">Education</option>
                        <option value="reference">Reference</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="newsletter">Newsletter Subscription</label>
                    <select id="newsletter" name="newsletter">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="recommendations">Book Recommendations</label>
                    <select id="recommendations" name="recommendations">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="language">Language Preference</label>
                    <select id="language" name="language">
                        <option value="english">English</option>
                        <option value="spanish">Spanish</option>
                        <option value="french">French</option>
                        <option value="german">German</option>
                        <option value="chinese">Chinese</option>
                        <option value="japanese">Japanese</option>
                        <option value="korean">Korean</option>
                        <option value="russian">Russian</option>
                        <option value="arabic">Arabic</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <button type="submit" class="update-preferences__button">
                    Save Preferences
                </button>
                <a href="<?= href('user', 'checkProfile') ?>"> 
                    <button
                        type="button"
                        class="update-preferences__button cancel-button">
                        Cancel
                    </button>
                </a>
            </form>
        </div>
    </section>
</main>