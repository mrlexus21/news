<div class="header-advert-area">
    @isset($adHeader)
        <a href="{{ $adHeader->link }}">
            <img src="{{ Storage::url(config('filesystems.local_paths.news_images') . $adHeader->image) }}" alt="{{ $adHeader->name }}">
        </a>
    @endisset
</div>
