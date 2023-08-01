@extends('layouts.front')

@section('title', 'Question - ' . $question->title)

@section('content')

    <section class="question-area pt-40px pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="question-main-bar mb-50px">
                        <div class="question-highlight">
                            <div class="media media-card shadow-none rounded-0 mb-0 bg-transparent p-0">
                                <div class="media-body">
                                    <h5 class="fs-20"><a href="question-details.html">{{ $question->title }}</a></h5>
                                    <div class="meta d-flex flex-wrap align-items-center fs-13 lh-20 py-1">
                                        <div class="pr-3">
                                            <span>Asked</span>
                                            <span class="text-black">
                                                {{ $question->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <div class="pr-3">
                                            <span class="pr-1">Active</span>
                                            <a href="#" class="text-black">19 days ago</a>
                                        </div>
                                        <div class="pr-3">
                                            <span class="pr-1">Viewed</span>
                                            <span class="text-black">
                                                {{ $question->total_views }}
                                                times</span>
                                        </div>
                                    </div>
                                    <div class="tags">
                                        @foreach ($question->tags as $tag)
                                            <a href="#" class="tag-link">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- end media -->
                        </div><!-- end question-highlight -->
                        <div class="question d-flex">
                            <div class="votes votes-styled w-auto">
                                <div id="vote" class="upvotejs">
                                    <a class="upvote upvote-on" data-toggle="tooltip" data-placement="right"
                                        title="This question is useful"></a>
                                    <span class="count">1</span>
                                    <a class="downvote" data-toggle="tooltip" data-placement="right"
                                        title="This question is not useful"></a>
                                    <a class="star" data-toggle="tooltip" data-placement="right"
                                        title="Bookmark this question."></a>
                                </div>
                            </div><!-- end votes -->
                            <div class="question-post-body-wrap flex-grow-1">
                                <div class="question-post-body">
                                    {!! $question->details !!}
                                </div><!-- end question-post-body -->
                                <div class="question-post-user-action">
                                    <div class="post-menu">
                                        <div class="btn-group">
                                            <button class="btn dropdown-toggle after-none" type="button"
                                                id="shareDropdownMenu" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Share</button>
                                            <div class="dropdown-menu dropdown--menu dropdown--menu-2 mt-2"
                                                aria-labelledby="shareDropdownMenu">
                                                <div class="py-3 px-4">
                                                    <h4 class="fs-15 pb-2">Share a link to this question</h4>
                                                    <form action="#" class="copy-to-clipboard">
                                                        <span class="text-success-message">Link Copied!</span>
                                                        <input type="text"
                                                            class="form-control form--control form-control-sm copy-input"
                                                            value="{{ route('questions.show', ['question' => $question->id]) }}">
                                                        <div
                                                            class="btn-box pt-2 d-flex align-items-center justify-content-between">
                                                            <a href="#" class="btn-text copy-btn">Copy link</a>
                                                            <ul class="social-icons social-icons-sm">
                                                                <li><a href="#" class="bg-8 text-white shadow-none"
                                                                        title="Share link to this question on Facebook"><i
                                                                            class="la la-facebook"></i></a></li>
                                                                <li><a href="#" class="bg-9 text-white shadow-none"
                                                                        title="Share link to this question on Twitter"><i
                                                                            class="la la-twitter"></i></a></li>
                                                                <li><a href="#" class="bg-dark text-white shadow-none"
                                                                        title="Share link to this question on DEV"><i
                                                                            class="lab la-dev"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- btn-group -->
                                        <button class="btn">Bookmark</button>
                                        <button class="btn">Follow</button>
                                    </div><!-- end post-menu -->
                                    <div class="media media-card user-media owner align-items-center">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="{{ asset('front-assets/images/img3.jpg') }}" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a
                                                        href="user-profile.html">{{ $question->createdBy->name }}</a></h5>

                                            </div>
                                            <small class="meta d-block text-right">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">
                                                    {{ $question->created_at->diffForHumans() }}
                                                </span>
                                            </small>
                                        </div>
                                    </div><!-- end media -->

                                </div><!-- end question-post-user-action -->

                            </div><!-- end question-post-body-wrap -->
                        </div><!-- end question -->
                        <div class="subheader d-flex align-items-center justify-content-between">
                            <div class="subheader-title">
                                <h3 class="fs-16">{{ $question->answers->count() }} Answer</h3>
                            </div><!-- end subheader-title -->
                            <div class="subheader-actions d-flex align-items-center lh-1">
                                <label class="fs-13 fw-regular mr-1 mb-0">Order by</label>
                                <div class="w-100px">
                                    <select class="select-container">
                                        <option value="active">active</option>
                                        <option value="oldest">oldest</option>
                                        <option value="votes" selected="selected">votes</option>
                                    </select>
                                </div>
                            </div><!-- end subheader-actions -->
                        </div><!-- end subheader -->

                        @foreach ($question->answers as $answer)
                            <div class="answer-wrap d-flex">
                                <div class="votes votes-styled w-auto">
                                    <div id="vote2" class="upvotejs">
                                        <a class="upvote upvote-on" data-toggle="tooltip" data-placement="right"
                                            title="This question is useful"></a>
                                        <span class="count">2</span>
                                        <a class="downvote" data-toggle="tooltip" data-placement="right"
                                            title="This question is not useful"></a>
                                        <a class="star check star-on" data-toggle="tooltip" data-placement="right"
                                            title="The question owner accepted this answer"></a>
                                    </div>
                                </div><!-- end votes -->
                                <div class="answer-body-wrap flex-grow-1">
                                    <div class="answer-body">
                                        {!! $answer->details !!}
                                    </div><!-- end answer-body -->
                                    <div class="question-post-user-action">
                                        <div class="post-menu">
                                            <div class="btn-group">
                                                <button class="btn dropdown-toggle after-none" type="button"
                                                    id="shareDropdownMenuTwo" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Share</button>
                                                <div class="dropdown-menu dropdown--menu dropdown--menu-2 mt-2"
                                                    aria-labelledby="shareDropdownMenuTwo">
                                                    <div class="py-3 px-4">
                                                        <h4 class="fs-15 pb-2">Share a link to this question</h4>
                                                        <form action="#" class="copy-to-clipboard">
                                                            <span class="text-success-message">Link Copied!</span>
                                                            <input type="text"
                                                                class="form-control form--control form-control-sm copy-input"
                                                                value="{{ route('questions.show', ['question' => $question->id]) }}">
                                                            <div
                                                                class="btn-box pt-2 d-flex align-items-center justify-content-between">
                                                                <a href="#" class="btn-text copy-btn">Copy link</a>
                                                                <ul class="social-icons social-icons-sm">
                                                                    <li><a href="#"
                                                                            class="bg-8 text-white shadow-none"
                                                                            title="Share link to this question on Facebook"><i
                                                                                class="la la-facebook"></i></a></li>
                                                                    <li><a href="#"
                                                                            class="bg-9 text-white shadow-none"
                                                                            title="Share link to this question on Twitter"><i
                                                                                class="la la-twitter"></i></a></li>
                                                                    <li><a href="#"
                                                                            class="bg-dark text-white shadow-none"
                                                                            title="Share link to this question on DEV"><i
                                                                                class="lab la-dev"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- btn-group -->
                                            <a href="#" class="btn">Bookmark</a>
                                            <button class="btn">Follow</button>
                                        </div><!-- end post-menu -->


                                        <div class="media media-card user-media align-items-center">
                                            <a href="user-profile.html" class="media-img d-block">
                                                <img src="{{ asset('front-assets/images/img4.jpg') }}" alt="avatar">
                                            </a>
                                            <div class="media-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5 class="pb-1"><a
                                                            href="user-profile.html">{{ $answer->createdBy->name }}</a>
                                                    </h5>

                                                </div>
                                                <small class="meta d-block text-right">
                                                    <span class="text-black d-block lh-18">answered</span>
                                                    <span class="d-block lh-18 fs-12">
                                                        {{ $answer->created_at->diffForHumans() }}
                                                    </span>
                                                </small>
                                            </div>
                                        </div><!-- end media -->

                                    </div><!-- end question-post-user-action -->
                                    <div class="comments-wrap">
                                        <ul class="comments-list">

                                            @foreach ($answer->replies as $reply)
                                                <li>
                                                    <div class="comment-actions">
                                                        <span class="comment-score">
                                                            {{ $answer->replies->count() }}
                                                        </span>
                                                    </div>

                                                    <div class="comment-body">
                                                        <span class="comment-copy">{{ $reply->reply }}</span>
                                                        <span class="comment-separated">-</span>
                                                        <a href="user-profile.html" class="comment-user owner"
                                                            title="224,110 reputation">
                                                            {{ $reply->createdBy->name }}
                                                        </a>
                                                        <span class="comment-separated">-</span>
                                                        <a href="#" class="comment-date">
                                                            {{ $reply->created_at->diffForHumans() }}
                                                        </a>
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="comment-form">
                                            <div class="comment-link-wrap text-center">
                                                <a class="collapse-btn comment-link" data-toggle="collapse"
                                                    href="#addCommentCollapse{{ $answer->id }}" role="button"
                                                    aria-expanded="false"
                                                    aria-controls="addCommentCollapse{{ $answer->id }}"
                                                    title="Use comments to ask for more information or suggest improvements. Avoid answering questions in comments.">Add
                                                    a reply</a>
                                            </div>
                                            <div class="collapse border-top border-top-gray mt-2 pt-3"
                                                id="addCommentCollapse{{ $answer->id }}">
                                                <form method="post" class="row pb-3" action="{{ route("replies.store") }}">
                                                    @csrf
                                                    <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                                                    <div class="col-lg-12">
                                                        <h4 class="fs-16 pb-2">Leave a Reply</h4>
                                                        <div class="divider mb-2"><span></span></div>
                                                    </div><!-- end col-lg-12 -->

                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="fs-13 text-black lh-20">Message</label>
                                                            <div class="form-group">
                                                                <textarea required class="form-control form--control form-control-sm fs-13" name="reply" rows="5"
                                                                    placeholder="Your reply here..."></textarea>

                                                            </div>
                                                        </div>
                                                    </div><!-- end col-lg-12 -->
                                                    <div class="col-lg-12">
                                                        <div
                                                            class="input-box d-flex flex-wrap align-items-center justify-content-between">

                                                            <button
                                                                class="btn theme-btn theme-btn-sm theme-btn-outline theme-btn-outline-gray"
                                                                type="submit">Post Reply</button>
                                                        </div>
                                                    </div><!-- end col-lg-12 -->
                                                </form>
                                            </div><!-- end collapse -->
                                        </div>
                                    </div><!-- end comments-wrap -->
                                </div><!-- end answer-body-wrap -->
                            </div><!-- end answer-wrap -->
                        @endforeach
                        <div class="subheader">
                            <div class="subheader-title">
                                <h3 class="fs-16">Your Answer</h3>
                            </div><!-- end subheader-title -->
                        </div><!-- end subheader -->
                        <div class="post-form">
                            <form method="post" class="pt-3" action="{{ route('anserts.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <div class="input-box">
                                    <label class="fs-14 text-black lh-20 fw-medium">Body</label>
                                    <div class="form-group">
                                        <textarea required class="form-control form--control form-control-sm fs-13 user-text-editor" name="details"
                                            rows="6" placeholder="Your answer here..."></textarea>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="fs-14 text-black fw-medium">Image</label>
                                    <div class="form-group">
                                        <div class="">
                                            <input type="file" name="images[]" class="form-control" multiple
                                                accept="image/*">

                                        </div>
                                    </div>
                                </div><!-- end input-box -->
                                <button class="btn theme-btn theme-btn-sm" type="submit">Post Your Answer</button>
                            </form>
                        </div>
                    </div><!-- end question-main-bar -->
                </div><!-- end col-lg-9 -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-17 pb-3">Number Achievement</h3>
                                <div class="divider"><span></span></div>
                                <div class="row no-gutters text-center">
                                    <div class="col-lg-6 responsive-column-half">
                                        <div class="icon-box pt-3">
                                            <span class="fs-20 fw-bold text-color">980k</span>
                                            <p class="fs-14">Questions</p>
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column-half">
                                        <div class="icon-box pt-3">
                                            <span class="fs-20 fw-bold text-color-2">610k</span>
                                            <p class="fs-14">Answers</p>
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column-half">
                                        <div class="icon-box pt-3">
                                            <span class="fs-20 fw-bold text-color-3">650k</span>
                                            <p class="fs-14">Answer accepted</p>
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column-half">
                                        <div class="icon-box pt-3">
                                            <span class="fs-20 fw-bold text-color-4">320k</span>
                                            <p class="fs-14">Users</p>
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12 pt-3">
                                        <p class="fs-14">To get answer of question <a href="signup.html"
                                                class="text-color hover-underline">Join<i
                                                    class="la la-arrow-right ml-1"></i></a></p>
                                    </div>
                                </div><!-- end row -->
                            </div>
                        </div><!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <div class="d-flex align-items-center pb-3">
                                    <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18"
                                        fill="#6c727c">
                                        <path
                                            d="M1 6l8 5 8-5V4L9 9 1 4c0-1.1.9-2 2-2h12c1.09 0 2 .91 2 2v10c0 1.09-.91 2-2 2H3c-1.09 0-2-.91-2-2V6z">
                                        </path>
                                    </svg>
                                    <h3 class="fs-17">Love this site?</h3>
                                </div>
                                <div class="divider"><span></span></div>
                                <p class="fs-14 lh-20 py-3">Get the <span class="text-dark fw-medium">weekly
                                        newsletter!</span> In it, you'll get:</p>
                                <ul class="generic-list-item generic-list-item-bullet fs-14 pb-3">
                                    <li class="lh-20">The week's top questions and answers</li>
                                    <li class="lh-20">Important community announcements</li>
                                    <li class="lh-20">Questions that need answers</li>
                                </ul>
                                <button class="btn theme-btn theme-btn-gray w-100">Sign up for the digest</button>
                                <p class="fs-14 pt-1 text-center">See an example newsletter</p>
                            </div>
                        </div><!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-17 pb-3">Related Questions</h3>
                                <div class="divider"><span></span></div>
                                <div class="sidebar-questions pt-3">
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">How to select the dom element with
                                                    event.target</a></h5>
                                            <small class="meta">
                                                <span class="pr-1">2 mins ago</span>
                                                <span class="pr-1">. by</span>
                                                <a href="#" class="author">Sudhir Kumbhare</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">How can you cut an onion without
                                                    crying?</a></h5>
                                            <small class="meta">
                                                <span class="pr-1">48 mins ago</span>
                                                <span class="pr-1">. by</span>
                                                <a href="#" class="author">wimax</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">How to change the behavior of dropdown
                                                    buttons in HTML</a></h5>
                                            <small class="meta">
                                                <span class="pr-1">1 hour ago</span>
                                                <span class="pr-1">. by</span>
                                                <a href="#" class="author">Antonin gavrel</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                </div><!-- end sidebar-questions -->
                            </div>
                        </div><!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-17 pb-3">Trending Tags</h3>
                                <div class="divider"><span></span></div>
                                <div class="tags pt-4">
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">analytics</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">computer</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">python</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">javascript</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">c#</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="collapse" id="showMoreTags">
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">java</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">swift</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">html</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">angular</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">flutter</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">machine-language</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                    </div><!-- end collapse -->
                                    <a class="collapse-btn fs-13" data-toggle="collapse" href="#showMoreTags"
                                        role="button" aria-expanded="false" aria-controls="showMoreTags">
                                        <span class="collapse-btn-hide">Show more<i
                                                class="la la-angle-down ml-1 fs-11"></i></span>
                                        <span class="collapse-btn-show">Show less<i
                                                class="la la-angle-up ml-1 fs-11"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end card -->
                        <div class="ad-card">
                            <h4 class="text-gray text-uppercase fs-13 pb-3 text-center">Advertisements</h4>
                            <div class="ad-banner mb-4 mx-auto">
                                <span class="ad-text">290x500</span>
                            </div>
                        </div><!-- end ad-card -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


@endsection

@push('js-after')
    <script></script>
@endpush
