@include ("partial.header")

        <form method="post" action="{{ route('add-task') }}">
            @csrf
            <input type="text" name="name" placeholder="Task name">
            <input type="text" name="price" placeholder="Price">
            <input type="number" value="2" name="cat" placeholder="Category">
            <button>Add</button>
        </form>
        <hr>
        <button>List</button> <button>Tree</button> <button>Grid</button>
        <br>
        <br>
        <section class='section'>

            @foreach($tasks as $index => $task)
            <div class="list <?php if($task->done==1){ echo "done"; } ?>"><span class='index'>{{$index+1}}</span>
                @if($task->category_id == 2)
                    <span class='label out'>
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16.000000pt" height="16.000000pt" viewBox="0 0 16.000000 16.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,16.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                <path d="M35 120 c-35 -36 -37 -40 -17 -40 17 0 22 -6 22 -24 0 -41 11 -56 40 -56 29 0 40 15 40 56 0 18 5 24 22 24 20 0 18 4 -17 40 -21 22 -42 40 -45 40 -3 0 -24 -18 -45 -40z"/>
                            </g>
                        </svg>
                        {{number_format($task->price,0)}}
                    </span>
                @endif
                @if($task->category_id == 3)
                    <span class='label in'>
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16.000000pt" height="16.000000pt" viewBox="0 0 16.000000 16.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,16.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                <path d="M46 144 c-3 -9 -6 -27 -6 -40 0 -18 -5 -24 -22 -24 -20 0 -18 -4 20 -42 l42 -43 42 43 c38 38 40 42 20 42 -17 0 -22 6 -22 24 0 13 -3 31 -6 40 -8 21 -60 21 -68 0z"/>
                            </g>
                        </svg>
                        {{$task->price}}
                    </span>
                @endif
                <span class='task-name'>{{$task->name}}</span>
                @if($task->done==0)
                    <a href="{{ url('done-task' , [ 'id' => $task->id ]) }}"><button>Done</button></a>
                @else
                    <span style="float: right;">Archived</span>
                @endif
                    <a href="{{ url('remove-task' , [ 'id' => $task->id ]) }}"><button>Remove</button></a>
            </div>
            @endforeach
        </section>
@include ("partial.footer")
