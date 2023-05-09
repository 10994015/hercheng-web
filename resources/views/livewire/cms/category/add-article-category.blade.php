<div class="addArticle" wire:ignore.self>
    <h1>新增文章分類</h1>
    <div class="card">
      <div class="card-title">
        <h2>Basic Information</h2>
      </div>
      @if(!$loading)
      <form wire:submit.prevent='onSubmit' >
        <div class="form-group">
          <label for="">分類名稱</label>
          <input type="text" wire:model='name' />
        </div>
        @if(session()->has('successMsg'))
        <span class="successMsg">{{session('successMsg')}}</span>
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
            <span wire:loading.remove wire:target='onSubmit'>新增分類</span>
          </button>
          <button
            class="pre"
            type="button"
          >
            回前頁
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
      @if ($errors->any())
      <div class="errorMsg">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
      </div>
      @endif
    </div>
  </div>