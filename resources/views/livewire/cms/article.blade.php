<div class="article" wire:loading.remove x-data="{
    init(){
        this.$dispatch('is-open-sidebar', {'name':'isArticle'})
    }
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
          />
        </div>
        <div class="form-group">
          <select v-model="perPage">
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
    <div class="table-responsive">
      <table class="table table-auto w-full animate-fade-in-down">
        <thead>
          <tr>
            <th class="w-[20px]">
              <input
                type="checkbox"
                v-model="isSelectAllChecked"
              />
            </th>
            <th
              class="w-[40px] cursor-pointer"
            >
              <div class="flex items-center">
                <div>Id</div>
                <div class="ml-2" v-if="sortField === 'id'">
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
                </div>
              </div>
            </th>
            <th
              class="cursor-pointer"
            >
              <div class="flex items-center">
                <div>圖片</div>
                <div class="ml-2" v-if="sortField === 'image'">
                  <svg
                    v-if="sortDirection === 'desc'"
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
                </div>
              </div>
            </th>
            <th
              :class="cursor-pointer"
            >
              <div class="flex items-center">
                <div>標題</div>
                <div class="ml-2" >
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
                </div>
              </div>
            </th>
            <th
              class="cursor-pointer'"
            >
              <div class="flex items-center">
                <div>分類</div>
                <div class="ml-2" v-if="sortField === 'category_id'">
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
                </div>
              </div>
            </th>
            <th
              class="cursor-pointer'"
            >
              <div class="flex items-center">
                <div>最後更新時間</div>
                <div class="ml-2">
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
                </div>
              </div>
            </th>
            <th>是否顯示</th>
            <th>操作</th>
          </tr>
        </thead>
        @if(false)
        <tbody  class="loadingTable">
          <tr>
            <td colspan="7" class="w-full" style="text-align: center">
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
            </td>
          </tr>
        </tbody>
        @endif
        <tbody >
          <tr
            class="animate-fade-in-down"
          >
            <td class="w-[20px]">
              <input
                type="checkbox"
                ref="checkItem"
              />
            </td>
            <td class="w-[40px]">article.id</td>
            <td>
              {{-- <img v-if="article.image_url" :src="article.image_url" /> --}}
              <img v-else src="@/assets/news.jpg" />
            </td>
            <td>article.title</td>
            {{-- <td v-if="categories[article.category_id]!=null">categories[article.category_id]</td> --}}
            <td v-else class="text-gray-400">尚無分類</td>
            <td>article.updated_at</td>
            <td>
              <span v-if="article.hidden">隱藏</span
              {{-- ><span v-else class="active">顯示</span> --}}
            </td>
            <td>
              <button
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
              </button>
              <button class="delete ml-5" >
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
                  :class="[
                   'bg-red-600' ,
                    'py-1',
                    'px-3',
                    'ml-4',
                    'text-white',
                    'rounded-sm',
                    'bg-gray-400',
                  ]"
                  :disabled="false"
                >
                  一鍵刪除
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    {{-- <div class="paging" v-if="articles.total > articles.limit">
      <div class="pageInfo">Showing from articles.from to articles.to</div>
      <div class="pageBtn">
        <nav>
          <a
            href="#"
            v-for="(link, i) of articles.links"
            :key="i"
            @click.prevent="getForPage($event, link)"
            :disabled="!link.url"
            :class="[{ active: link.active }, { disabled: !link.url }]"
            v-html="link.label"
          ></a>
        </nav>
      </div>
    </div> --}}
  </div>
</div>

    