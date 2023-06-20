<div class="reservation-info">
    <form class="reservation-form" method="post">
        <h2><?php echo esc_html(get_option('leregal_feedback')); ?></h2>
        <div class="field">
            <textarea name="message" Placeholder="Message" required></textarea>
        </div>
        <input type="submit" name="reservation" class="button primary">
        <input type="hidden" name="hidden" value="1">
    </form>
</div>