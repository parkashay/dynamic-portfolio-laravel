<div class="footer">
    <div class="contact-section">
        @foreach ($contacts as $contact)
            <span>{{ $contact->title . ' : ' . $contact->content }}</span>
        @endforeach
    </div>
    <div class="some-links">
        <button class="rickroller">ACTIVATE 3D ANIMATIONS</button>
    </div>
    <div class="last-part">
        Made in laravel by <a href="/auth" class="footer-link">Prakash Poudel</a>
    </div>
</div>
<script src="{{ asset('js/footer.js') }}"></script>
