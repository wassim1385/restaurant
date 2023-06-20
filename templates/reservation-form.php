<div class="reservation-info">
    <form class="reservation-form" method="post">
        <h2>Réservez votre table!</h2>
        <div class="field">
            <input type="text" name="name" Placeholder="Nom" required>
        </div>
        <div class="field">
            <input type="datetime-local" name="date" Placeholder="Date" required>
        </div>
        <div class="field">
            <input type="text" name="email" Placeholder="E-mail">
        </div>
        <div class="field">
            <input type="tel" name="phone" Placeholder="Téléphone" required>
        </div>
        <div class="field">
            <textarea name="message" Placeholder="Message" required></textarea>
        </div>
        <input type="submit" name="reservation" class="button primary">
        <input type="hidden" name="hidden" value="1">
    </form>
</div>