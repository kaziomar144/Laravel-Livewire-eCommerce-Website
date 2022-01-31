<div>
<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div id="review_form_wrapper">
                <div id="comments">
                    <h2 class="woocommerce-Reviews-title">Add review for</h2>
                    <ol class="commentlist">
                        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                            <div id="comment-20" class="comment_container"> 
                                <img alt="{{$orderItem->product->name}}" src="{{asset('assets')}}/images/products/{{$orderItem->product->image}}" height="80" width="80">
                                <div class="comment-text">
                                    <p class="meta"> 
                                        <strong class="woocommerce-review__author" style="text-transform: capitalize">{{$orderItem->product->name}}</strong> 
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div><!-- #comments -->
                <div id="review_form">
                    <div id="respond" class="comment-respond"> 

                        <form id="commentform" class="comment-form" wire:submit.prevent="addReview">
                            @csrf
                            <div class="comment-form-rating">
                                <span>Your rating</span>
                                <p class="stars">
                                    
                                    <label for="rated-1"></label>
                                    <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                    <label for="rated-2"></label>
                                    <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                    <label for="rated-3"></label>
                                    <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                    <label for="rated-4"></label>
                                    <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                                    <label for="rated-5"></label>
                                    <input type="radio" id="rated-5" name="rating" value="5" wire:model="rating" checked="checked">
                                    @error('rating')
                                        <span style="color: crimson">{{$message}}</span>
                                    @enderror
                                </p>
                            </div>
                            <p class="comment-form-comment">
                                <label for="comment">Your review <span class="required">*</span>
                                </label>
                                <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                                @error('comment')
                                <span style="color: crimson">{{$message}}</span>
                            @enderror
                            </p>
                            <p class="form-submit">
                                {{-- <span wire:loading="" wire:target="addReview" style="padding-right: 5px">
                                    <i style="font-size: 14px" class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                </span> --}}
                                <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                            </p>
                        </form>

                    </div><!-- .comment-respond-->
                </div><!-- #review_form -->
            </div><!-- #review_form_wrapper -->
        </div>
    </div>
</div>
</div>
