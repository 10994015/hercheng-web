<div class="addArticle">
    <h1>{{$baseTitle}}</h1>
    <div class="card">
      <div class="card-title">
        <h2>Basic Information</h2>
      </div>
      @if(true)
      <form  action="" @submit.prevent="onSubmit()">
        <div class="form-group">
          <label for="">文章分類</label>
          <div class="container">
            {{-- <select v-if="categoryLoading" disabled>
            <option value="">Loading...</option>
            </select> --}}
            <select v-else v-model="article.category_id">
              <option v-for="category in categories"   >category.name</option>
            </select>
            <a href="##">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
            </a>
          </div>
          
        </div>
        <div class="form-group">
          <label for="">文章標題</label>
          <input type="text" v-model="article.title" />
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
        <textarea id="editor" name="editor" v-model="article.content"></textarea>
        </div>
        <div class="form-group">
          <label for="">文章圖片</label>
          <label for="imagefile" class="imagefileFor">
            <svg
              v-if="previewLoading"
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
            <div v-if="!isPreview">
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
            {{-- <div v-else class="isPreview">
              <img src="" ref="previewImg" id="previewImg" />
            </div> --}}
          </label>
          <input type="file" id="imagefile" hidden @change="previewImage()" />
        </div>
        <div class="chkbox-group">
          <div class="form-group">
            <label for="">隱藏文章</label>
            <input type="checkbox" v-model="article.hidden" />
          </div>
        </div>
        <span v-if="successMsg" class="successMsg">successMsg</span>
        <div class="form-group btn-group mt-10">
          <button type="submit" >
            <svg
              v-if="loading"
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
            <span v-else>保存更改</span>
          </button>
          <button
            class="pre"
            type="button"
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