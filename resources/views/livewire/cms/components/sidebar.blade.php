<div class="sideBar" :class="{'close':isCloseSidebar}">
    <ul>   
        <a href="{{route('cms.dashboard')}}">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"
                />
                </svg>
                <span x-show="!isCloseSidebar">首頁</span>
                </a>
        <a href="javascript:;" x-on:click="sideBar.isArticle = !sideBar.isArticle; isCloseSidebar = false">
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
                    d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802"
                />
                </svg>
                <span x-show="!isCloseSidebar">最新消息</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-3 h-3 ml-auto"
                    x-bind:class="{'active': sideBar.isArticle}"
                    x-show="!isCloseSidebar"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                    />
                </svg>
        </a>
        <ol :class="{'open':sideBar.isArticle}">
            <a href="{{route('cms.article')}}">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    :class="['w-3', 'h-3']"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 4.5l7.5 7.5-7.5 7.5"
                    />
                </svg>
                <span x-show="!isCloseSidebar">文章列表</span>
            </a>
            <a href="{{route('cms.article')}}">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-3 h-3"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 4.5l7.5 7.5-7.5 7.5"
                    />
                </svg>
                <span x-show="!isCloseSidebar">文章分類</span>
            </a>
        </ol>


    </ul>
</div>