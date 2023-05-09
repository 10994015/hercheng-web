<div class="article"  wire:ignore.self x-data="{
    deleteItem(id){
      if(confirm('確認要刪除此文章嗎？')){
        window.Livewire.emit('destroy', id);
      }
    },
    deleteItems(){
      if(confirm('確認要刪除嗎？')){
        window.Livewire.emit('deleteItems');
      }
    },
    init(){
        this.$dispatch('is-open-sidebar', {'name':'isArticle'})
    },
    
}">
  <div class="card">
    <div class="card-header">
      <div class="left">
        <div class="form-group">
          <div class="icon">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-4 h-4"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
              />
            </svg>
          </div>
          <input
            type="text"
            placeholder="搜尋..."
            wire:model="search"
          />
        </div>
        <div class="form-group">
          <select wire:model="per_page">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
        </div>
      </div>
      <div class="right">
        <div class="form-group">
          <a href="{{route('cms.add-article', ['id'=>'create'])}}"
            class="btn"
            >+ 新增文章</a
          >
        </div>
      </div>
    </div>
    <div class="table-responsive ">
      <table class="table table-auto w-full animate-fade-in-down">
        <thead>
          <tr>
            <th class="w-[20px]">
              <input
                type="checkbox"
                wire:model="chkAllBox"
                wire:change="chkAll"
              />
            </th>
            <th
              class="w-[40px] cursor-pointer @if($sort_field==='id') active @endif"
              wire:click="sortSwitch('id')"
            >
              <div class="flex items-center">
                <div>Id</div>
                @if($sort_field==='id')
                <div class="ml-2">
                  @if($sort_direction === 'desc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4.5 15.75l7.5-7.5 7.5 7.5"
                    />
                  </svg>
                  @endif
                  @if($sort_direction === 'asc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                    />
                  </svg>
                  @endif
                </div>
                @endif
              </div>
            </th>
            <th
              class="cursor-pointer  @if($sort_field==='image') active @endif"
              wire:click="sortSwitch('image')"
            >
              <div class="flex items-center" >
                <div>圖片</div>
                @if($sort_field==='image')
                <div class="ml-2">
                  @if($sort_direction === 'desc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4.5 15.75l7.5-7.5 7.5 7.5"
                    />
                  </svg>
                  @endif
                  @if($sort_direction === 'asc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                    />
                  </svg>
                  @endif
                </div>
                @endif
              </div>
            </th>
            <th
              class="cursor-pointer @if($sort_field==='title') active @endif"
              wire:click="sortSwitch('title')"
            >
              <div class="flex items-center">
                <div>標題</div>
                @if($sort_field==='title')
                <div class="ml-2">
                  @if($sort_direction==='desc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4.5 15.75l7.5-7.5 7.5 7.5"
                    />
                  </svg>
                  @endif
                  @if($sort_direction==='asc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                    />
                  </svg>
                  @endif
                </div>
                @endif
              </div>
            </th>
            <th
              class="cursor-pointer @if($sort_field==='category_id') active @endif"
              wire:click="sortSwitch('category_id')"
            >
              <div class="flex items-center">
                <div>分類</div>
                @if($sort_field==='category_id')
                <div class="ml-2">
                  @if($sort_direction==='desc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4.5 15.75l7.5-7.5 7.5 7.5"
                    />
                  </svg>
                  @endif
                  @if($sort_direction==='asc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                    />
                  </svg>
                  @endif
                </div>
                @endif
              </div>
            </th>
            <th
              class="cursor-pointer @if($sort_field==='updated_at') active @endif"
              wire:click="sortSwitch('updated_at')"
            >
              <div class="flex items-center ">
                <div>最後更新時間</div>
                @if($sort_field==='updated_at')
                <div class="ml-2">
                  @if($sort_direction === 'desc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4.5 15.75l7.5-7.5 7.5 7.5"
                    />
                  </svg>
                  @endif
                  @if($sort_direction === 'asc')
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-4 h-4"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                    />
                  </svg>
                  @endif
                </div>
                @endif
              </div>
            </th>
            <th>是否顯示</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody wire:loading.remove wire:target='sortSwitch'>
          @foreach($articles as $article)
          <tr
            class="animate-fade-in-down"
          >
            <td class="w-[20px]">
              <input
                type="checkbox"
                wire:model="checkItem.{{$article->id}}"
                {{-- wire:change='changeCheck({{$article->id}})' --}}
                wire:change='changeCheck()'
              />
            </td>
            <td class="w-[40px]">{{$article->id}}</td>
            <td>
              @if($article->image)
              <img src="{{$article->image}}" />
              @else
              <img src="/images/bg.jpg" />
              @endif
            </td>
            <td>{{$article->title}}</td>
            @if($article->category_id)
            <td>{{$article->category->name}}</td>
            @else
            <td class="text-gray-400">尚無分類</td>
            @endif
            <td>{{$article->updated_at}}</td>
            <td>
              @if($article->hidden)
              <span>隱藏</span>
              @else
              <span class="active">顯示</span>
              @endif
            </td>
            <td>
              <a href="{{route('cms.add-article', ['id'=>$article->id])}}"
                class="edit ml-1"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-5 h-5"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                  />
                </svg>
              </a>
              <button class="delete ml-5" x-on:click="deleteItem({{$article->id}})">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-5 h-5"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                  />
                </svg>
              </button>
            </td>
          </tr>
          @endforeach
          <tr >
            <td colspan="7">
              <div class="flex items-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-4 h-4 text-gary-400"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18"
                  />
                </svg>
                <button
                  class="
                    py-1
                    px-3
                    ml-4
                  text-white
                    rounded-sm
                  @if(count(array_filter($checkItem, fn($item)=>$item==true))<=0) bg-gray-400 @else bg-red-600 cursor-pointer @endif
                  "
                  @if(count(array_filter($checkItem, fn($item)=>$item===true)) <= 0) disabled @endif
                  x-on:click="deleteItems()"
                >
                  一鍵刪除
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="w-full flex justify-center items-center mt-10 mb-10" wire:loading.flex wire:target='sortSwitch'>
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
    <div class="mt-5">
      {{ $articles->links() }}
    </div>
  </div>
</div>

@push('scripts')
<script>
window.addEventListener('deleteSuccess', e=>{
  alert('刪除成功！')
})
</script>
@endpush