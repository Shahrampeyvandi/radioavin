 <div class="col-md-4">
                        <h6 class="">Category: </h6>
                        <div class="cat row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="" id="pprev" placeholder="name">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary mb-3"
                                    onclick="addCategory(event,'{{route('Panel.AddCatAjax')}}')">add</a>
                                <div class="cat-wrapper  card pr-2"
                                    style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
                                    @foreach (\App\Category::all() as $key=>$item)
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" id="cat-{{$key+1}}" name="categories[]"
                                            value="{{$item->id}}" class="custom-control-input scat" @if (isset($post))
                                            {{$post->categories->pluck('id')->contains($item->id) ? 'checked' : ''}}
                                            @endif>
                                        <label class="custom-control-label" for="cat-{{$key+1}}">{{$item->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        {{-- tags --}}
                      <h6 class="">Tags: </h6>
                        <div class="cat row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="" id="tag" placeholder="name">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary mb-3"
                                    onclick="addTag(event)">add</a>
                                <div class="tag-wrapper  card pr-2"
                                    style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
                                    @foreach (\App\Tag::all() as $key=>$item)
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" id="tag-{{$key+1}}" name="tags[]"
                                            value="{{$item->id}}" class="custom-control-input stag" @if (isset($post))
                                            {{$post->tags->pluck('id')->contains($item->id) ? 'checked' : ''}}
                                            @endif>
                                        <label class="custom-control-label" for="tag-{{$key+1}}">{{$item->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- end tags --}}

                          {{-- Lyrics --}}
                      <h6 class="">Lyrics: </h6>
                        <div class="cat row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="" id="lyric" placeholder="name">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary mb-3"
                                    onclick="addLyric(event)">add</a>
                                <div class="tag-wrapper  card pr-2"
                                    style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
                                    @foreach (\App\Lyric::all() as $key=>$item)
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" id="lyric-{{$key+1}}" name="lyrics[]"
                                            value="{{$item->id}}" class="custom-control-input slyric" @if (isset($post))
                                            {{$post->lyrics->pluck('id')->contains($item->id) ? 'checked' : ''}}
                                            @endif>
                                        <label class="custom-control-label" for="lyric-{{$key+1}}">{{$item->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- end Lyrics --}}


                          {{-- arrangements --}}
                      <h6 class="">Arrangements: </h6>
                        <div class="cat row">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="" id="arrangement" placeholder="name">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary mb-3"
                                    onclick="addArrangement(event)">add</a>
                                <div class="arrangement-wrapper  card pr-2"
                                    style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
                                    @foreach (\App\Arrangement::all() as $key=>$item)
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" id="arrangement-{{$key+1}}" name="arrangements[]"
                                            value="{{$item->id}}" class="custom-control-input sarrangement" @if (isset($post))
                                            {{$post->arrangements->pluck('id')->contains($item->id) ? 'checked' : ''}}
                                            @endif>
                                        <label class="custom-control-label" for="arrangement-{{$key+1}}">{{$item->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- end arrangements --}}
                    </div>