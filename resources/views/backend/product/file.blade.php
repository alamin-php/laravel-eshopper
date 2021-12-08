<div class="col-md-12">
                          <div class="form-group">
                            <label for="sliderTitle"> {{ __('Slider Title') }}</label>
                            <input type="text" name="slider_title" class="form-control" id="sliderTitle" value="{{ $slider->slider_title }}">
                            @error('slider_title')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="btn_title"> {{ __('Button Title') }}</label>
                            <input type="text" name="btn_title" class="form-control" id="sliderTitle" value="{{ $slider->btn_title }}">
                            @error('btn_title')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="btn_link"> {{ __('Button Link') }}</label>
                            <input type="text" name="btn_link" class="form-control" id="sliderTitle" value="{{ $slider->btn_link }}">
                            @error('btn_link')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="slider_description"> {{ __('Slider discription') }}</label>
                            <textarea class="textarea" name="slider_description" placeholder="Enter product short description"
                            style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $slider->slider_description !!}</textarea>
                            @error('slider_description')
                              <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                          <label for="sliderImage"> {{ __('Image') }}</label>
                          <input type="file" name="image" id="inputImage" accept="iamge/*" class="upload" onchange="readURL(this);">
                          <input type="hidden" name="old_photo" value="{{ $slider->image }}">
                          <img width="200" class="img-thumbnail" id="image" src="{{ asset($slider->image) }}" alt="Slider image">
                          </div>
                    </div>