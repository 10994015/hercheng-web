<div class="addArticle" wire:ignore.self>
    <h1>{{$baseTitle}}</h1>
    <div class="card">
      <div class="card-title">
        <h2>Basic Information</h2>
      </div>
      @if(true)
      <form  wire:submit.prevent='onSubmit'>
        <div class="form-group">
          <label for="">文章分類</label>
          <div class="container">
            <select wire:model="category_id">
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
            <a href="{{route('cms.add-article-category')}}">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
            </a>
          </div>
        </div>
        <div class="form-group">
          <label for="">文章標題</label>
          <input type="text" wire:model="title" />
        </div>
        <div class="form-group">
          <label for="">文章內容</label>
          {{-- <ckeditor
            :editor="editor"
            id="editor"
            v-model="article.content"
            :config="{
              ckfinder: {
                uploadUrl: 'http://localhost:8000/api/upload-images'
              },
            }"
          ></ckeditor> --}}
        <textarea name="content" wire:model="content"></textarea>
        </div>
        <div class="form-group">
          <label for="">文章圖片</label>
          <label for="imagefile" class="imagefileFor">
            <svg
              wire:loading wire:target="image"
              class="animate-spin h-5 w-5 text-gray-500"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
            >
              <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
              ></circle>
              <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
              ></path>
            </svg>
            @if(!$image)
            <div wire:loading.remove wire:target="image">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 mb-2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"
                />
              </svg>
              <span>將文件拖放到此處或單擊以上傳。</span>
            </div>
            @else
            <div class="isPreview">
              <img src="{{$image->temporaryUrl()}}" id="previewImg" />
            </div>
            @endif
          </label>
          <input type="file" id="imagefile" wire:model="image" hidden />
        </div>
        <div class="chkbox-group">
          <div class="form-group">
            <label for="">隱藏文章</label>
            <input type="checkbox" wire:model="hidden" />
          </div>
        </div>
        @if(session()->has('success'))
        <span class="successMsg">{{session('success')}}</span>
        @endif
        <div class="form-group btn-group mt-10">
          <button type="submit" >
            <svg
              wire:loading wire:target='onSubmit'
              class="animate-spin h-5 w-5 text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
            >
              <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
              ></circle>
              <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
              ></path>
            </svg>
            <span wire:loading.remove wire:target='onSubmit'>保存更改</span>
          </button>
          <button
            class="pre"
            type="button"
            onclick="window.history.go(-1)"
          >
            回列表
          </button>
        </div>
      </form>
      @else
      <div class="flex items-center justify-center py-10">
        <svg
          class="animate-spin h-5 w-5 text-gray-500"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
        >
          <circle
            class="opacity-25"
            cx="12"
            cy="12"
            r="10"
            stroke="currentColor"
            stroke-width="4"
          ></circle>
          <path
            class="opacity-75"
            fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
          ></path>
        </svg>
      </div>
      @endif
      <div class="errorMsg" v-if="errorMsg">
        {{-- <span v-for="(error, i) in errorMsg" :key="i"> {{ error[0] }}</span> --}}
      </div>
    </div>
  </div>