<div>
    <span style="font-size: 16px; margin-right: 10px;">
        <i class="fa fa-eye"></i> {{ $viewsCount }}
    </span>
    <span style="font-size: 16px; margin-right: 10px; cursor: pointer;" wire:click="like">
        <i class="fa fa-thumbs-up"></i> {{ $likesCount }}
    </span>
    <span style="font-size: 16px; margin-right: 10px; cursor: pointer;" wire:click="dislike">
        <i class="fa fa-thumbs-down"></i> {{ $dislikesCount }}
    </span>
</div>
