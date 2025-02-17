
    <x-app-layout>

        @if (session('success') || session('error'))
<div id="statusToast" class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md">
    <div class="bg-gray-100 border-l-4 @if(session('success')) border-blue-500 @else border-red-500 @endif rounded-r-lg shadow-md overflow-hidden">
        <div class="p-4 flex items-center">
            <div class="flex-shrink-0">
                @if (session('success'))
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @else
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @endif
            </div>
            <div class="ml-3 w-0 flex-1">
                @if (session('success'))
                    <p class="text-lg font-semibold text-blue-900">
                        {!! session('success') !!}
                    </p>
                @endif
                @if (session('error'))
                    <p class="text-sm font-medium text-gray-900">
                        {{ session('error') }}
                    </p>
                @endif


            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button id="closeToast" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                閉じる
            </button>
        </div>
    </div>
</div>

<style>
    @keyframes slideDown {
        from { transform: translate(-50%, -100%); }
        to { transform: translate(-50%, 0); }
    }
    #statusToast {
        animation: slideDown 0.5s ease-out;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var statusToast = document.getElementById('statusToast');
        var closeToast = document.getElementById('closeToast');

        var hideTimeout = setTimeout(function() {
            hideToast();
        }, 8000);

        closeToast.addEventListener('click', function() {
            clearTimeout(hideTimeout);
            hideToast();
        });

        function hideToast() {
            statusToast.style.transform = 'translate(-50%, -100%)';
            statusToast.style.transition = 'transform 0.5s ease-in-out';
            setTimeout(function() {
                statusToast.style.display = 'none';
            }, 500);
        }
    });
</script>
@endif
        <div class="min-h-screen bg-gray-200 py-8">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 bg-gradient-to-r from-sky-600 to-blue-600 p-5 rounded-xl px-10 py-10">
                    <div class="mb-4 md:mb-0">
                        <h1 class="text-3xl font-bold text-white">
                            求人投稿管理
                        </h1>
                        <p class="mt-4 text-sm text-white">
                            求人投稿一覧
                        </p>
                    </div>

                    <a href="{{ route('jobpost.create') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl text-white font-semibold shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                       新規求人投稿
                    </a>
                </div>


                <!-- Main Content Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <!-- Search and Filter Section -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <form action="{{ route('jobpost.index') }}" method="GET" class="mb-4">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </div>
                                    <input type="text"
                                           class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                           placeholder="検索...">

                                           <button type="submit">Search</button>
                                </div>

                            </form>


                        </div>
                    </div>

                    <!-- Table Section -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-sky-200 border ">
                                <tr class="border-gray-300">
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                      番号
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        カテゴリー名
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        状態
                                    </th>
                                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                       作動
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100 ">
                                @foreach ($jobpost as $item)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border border-gray-200">
                                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($item->title, 30, '..') }}</div>
                                    </td>


                                    {{-- <div class="mt-2 text-sm text-gray-500">
                                        公開情報:
                                           @if ($jobpost->status === '承認')
                                               <span class="text-white bg-green-600 px-2 py-2 rounded-lg font-bold">公開中</span>
                                           @elseif ($jobpost->status === '進行中')
                                               <span class="text-white bg-yellow-500 px-2 py-2 rounded-lg  font-bold">申請中</span>
                                           @elseif ($jobpost->status === '拒否')
                                               <span class="text-white bg-red-500 px-2 py-2 rounded-lg font-bold">拒否</span>
                                           @endif
                                       </div> --}}

                                       <td class="px-6 py-4 whitespace-nowrap border border-gray-200">
                                        <div class="text-sm font-semibold
                                            @if($item->status == '承認')
                                                bg-blue-400 text-white  px-2 py-2 rounded-full text-center
                                            @elseif($item->status == '進行中')
                                             bg-orange-400 text-white  px-2 py-2 rounded-full text-center
                                            @elseif($item->status == '拒否')
                                           bg-red-400 text-white  px-2 py-2 rounded-full text-center
                                            @else
                                                text-gray-900
                                            @endif
                                        ">
                                            {{ $item->status }}
                                        </div>
                                    </td>



                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium border border-gray-200">
                                        <div class="flex justify-end space-x-3">
                                            @if(auth()->user()->role === 'admin')
                                                <form action="{{ route('jobpost.approve', $item->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 rounded-lg text-green-600 hover:text-green-900 bg-green-300 hover:bg-green-400 transition-colors duration-200">
                                                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                        承認
                                                    </button>
                                                </form>

                                                <form action="{{ route('jobpost.reject', $item->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 rounded-lg text-red-600 hover:text-red-900 bg-red-200  hover:bg-red-300 transition-colors duration-200"
                                                            onclick="return confirm('本当にこの求人投稿を拒否しますか？')">
                                                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                        拒否
                                                    </button>
                                                </form>
                                            @endif

                                            <a href="{{ route('jobpost.edit', $item) }}"
                                               class="inline-flex items-center px-3 py-1.5 rounded-lg text-indigo-600 hover:text-indigo-900 bg-indigo-200 hover:bg-indigo-300 transition-colors duration-200">
                                               <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                               </svg>
                                               編集
                                            </a>

                                            <form action="{{ route('jobpost.destroy', $item) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-red-600 hover:text-red-900 bg-rose-300 hover:bg-rose-500 transition-colors duration-200"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    消去
                                                </button>
                                            </form>

                                            <a href="{{ route('jobpost.show', $item->id) }}"
                                            class="inline-flex items-center px-3 py-1.5 rounded-lg text-white hover:text-gray-100 bg-yellow-400 hover:bg-yellow-500 transition-colors duration-200">
                                            <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            見る
                                         </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Section -->
                    <div class="px-6 py-4 border-t border-gray-100">
                        {{-- {{ $items->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>


