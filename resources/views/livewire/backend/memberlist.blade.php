@use Carbon\Carbon;
<div>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('swal', (event) => {
                const data = event
                swal.fire({
                    icon: data[0]['icon'],
                    title: data[0]['title'],
                    text: data[0]['text'],
                    timer: 3000,
                    showConfirmButton: false
                })
            });
        });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <div class="page-body">


        <!-- Container-fluid starts-->
        <div class="container-fluid  basic_table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="mb-3">All Members List</h4><button wire:click='addNewModal()'
                                class="btn btn-primary">Add New</button>
                        </div>
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" wire:model.live="search" class="form-control"
                                            placeholder="Search username" aria-label="Search 1"
                                            aria-describedby="search1">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" wire:model.live="sph" class="form-control"
                                            placeholder="Search Phone" aria-label="Search 2" aria-describedby="search2">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive custom-scrollbar">
                                    <table class="table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Referral Chain</th>
                                                <th scope="col">Ph Number</th>
                                                <th scope="col">invitation code</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Today's Commission</th>
                                                <th scope="col">Daily Order Limit</th>

                                                <th scope="col">Today Orders</th>
                                                <th scope="col">Total Orders</th>
                                                <th scope="col">Parent Username</th>

                                                <th scope="col">status</th>
                                                <th scope="col">member level</th>
                                                <!-- <th  >frozen amount</th>
 --> <!-- <th  >rob single</th> -->
                                                <th scope="col">Registration time</th>
                                                <th scope="col">Login time</th>
                                                <th scope="col" wire:click='addNewModal()'>
                                                    <i class="fa fa-plus"></i>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($members)
                                                @foreach ($members as $key => $member)
                                                    <tr>
                                                        <td>{{ $member->id }}</td>
                                                        <td>{{ $member->username }}</td>
                                                        <td><button wire:click="referralChains({{ $member->id }})" class="btn btn-primary">View</button></td>
                                                        <td>{{ $member->ph }}</td>
                                                        <td>{{ $member->myCode }}</td>
                                                        <td>{{ number_format($member->balance, 2) }}</td>
                                                        <td>
                                                            @php
                                                                $rewardsArray = [];
                                                                $ar = $todayCommission;
                                                                foreach ($ar as $reward) {
                                                                    $rewardsArray[$reward->userId][] = $reward->reward;
                                                                }
                                                                $vales = 0;
                                                                if (isset($rewardsArray[$member->id])) {
                                                                    foreach (
                                                                        $rewardsArray[$member->id]
                                                                        as $key => $value
                                                                    ) {
                                                                        $vales += (float) $value;
                                                                    }
                                                                    echo $vales;
                                                                } else {
                                                                    echo '0';
                                                                }
                                                            @endphp

                                                        </td>

                                                        <td>
                                                            @if (isset($dailyLimit[$member->memberLevel]))
                                                                {{ $dailyLimit[$member->memberLevel] }}
                                                            @else
                                                                {{ 'Please Update level' }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @php
                                                                $plainArray = $todayActions->toArray();
                                                                $valueCounts = array_count_values($plainArray);
                                                                $countOf14 = isset($valueCounts[$member->id])
                                                                    ? $valueCounts[$member->id]
                                                                    : 0;
                                                            @endphp
                                                            {{ $countOf14 }}</td>
                                                        <td>
                                                            @php
                                                                $plainArray = $totalActions->toArray();
                                                                $valueCounts = array_count_values($plainArray);
                                                                $countOf14 = isset($valueCounts[$member->id])
                                                                    ? $valueCounts[$member->id]
                                                                    : 0;
                                                            @endphp
                                                            {{ $countOf14 }}
                                                        </td>
                                                        <td style="width: 200px;">
                                                            @if (isset($usernames[$member->inviteCode]))
                                                                {{ $usernames[$member->inviteCode] }}
                                                            @else
                                                                Username not found for invite code:
                                                                {{ $member->inviteCode }}
                                                            @endif
                                                        </td>



                                                        <td style="width: 160px;">

                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    wire:change="statusChange('{{ $member->id }}', $event.target.checked)"
                                                                    {{ $member->status ? 'checked' : '' }}
                                                                    id="{{ $member->id }}">
                                                                <span class="slider"></span>
                                                            </label>


                                                        </td>
                                                        <td>{{ $member->memberLevel }}</td>
                                                        <td>{{ $member->registrationTime ? CarbonCarbon::parse($member->registrationTime)->format("Y-m-d H:i:s") : "" }}</td>
                                                        <td>
                                                            <span>{{ $member->lastLongInTime ? CarbonCarbon::parse($member->lastLongInTime)->format("Y-m-d H:i:s") : "" }}</span>
                                                        </td>
                                                        <td wire:click="optionOpen({{ $member->id }})">
                                                            <i class="fa fa-edit"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        {{ $members->links() }}
        <!-- Container-fluid Ends-->
    </div>
    @if ($resetModel)
        <!-- Order Rest Model -->
        <div class="modal fade show" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel"
            aria-modal="true" role="dialog" style="display: block; padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Rest Orders</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            wire:click='resetclose'>
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Make Sure! After Click on Reset We do not recover data</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click='resetclose'
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click='resetnow'>Reset</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order Rest Model End -->
    @endif
    <!-- add Bank info model -->
    @if ($bankinfoModel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog"
            aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myExtraLargeModal">Bank Card Information</h4>
                        <button class="btn-close py-0" type="button" wire:click="bankinfoModelClose"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                            <p> Fill in your information below to continue.</p>
                            <form class="row g-3" wire:submit.prevent="bankupdate">
                                <div class="col-md-12">
                                    <label class="form-label" for="Your Name">Your Name</label>
                                    <input class="form-control" id="inputEmailEnter" type="text"
                                        wire:model="name" placeholder="Your Name">
                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label" for="Bank Name">Bank Name</label>
                                    <input class="form-control" id="ParentID" type="text" wire:model="bankName"
                                        placeholder="Bank Name">
                                    @error('bankName')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Card Number">Card Number</label>
                                    <input class="form-control" id="Balance" type="text"
                                        wire:model="cardNumber" placeholder="Card Number">
                                    @error('cardNumber')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Phone Number">Phone number</label>
                                    <input class="form-control" id="Mobile phone number" type="text"
                                        wire:model="phoneNumber" placeholder="Phone number">
                                    @error('phoneNumber')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">ok</button>
                                    <button class="btn btn-danger" wire:click="bankinfoModelClose" type="button"
                                        data-bs-dismiss="modal" style="position:absolute; right:10px;">Close </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- show referral user information in table --}}
    <!-- Modal -->
    @if ($referralUsers)
    <div class="modal fade bd-example-modal-lg show" tabindex="-1" aria-labelledby="myExtraLargeModal"
            style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="referralModalLabel">Referral Chain</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="referralCloseModal"></button>
                </div>
                <div class="modal-body">
                    @if ($referralChain)

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>My Code</th>
                                <td>Balance</th>
                                <th>Member Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referralChain as $referral)
                                <tr>
                                    <td>{{ $referral->level }}</td>
                                    <td>{{ $referral->username }}</td>
                                    <td>{{ $referral->myCode }}</td>
                                    <td>{{ $referral->balance }}</td>
                                    <td>{{ $referral->memberLevel }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>No Referral Chain Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- add bank info model end-->
    @if ($debitModel)
        <!-- Add Debit -->
        <div class="modal fade bd-example-modal-lg show" tabindex="-1" aria-labelledby="myExtraLargeModal"
            style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myExtraLargeModal">Add Debit</h4>
                        <button class="btn-close py-0" type="button" wire:click="debitcloseModal"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3" wire:submit.prevent="debitUpdated({{ $memberId }})">
                            <div class="col-md-12">
                                <label class="form-label" for="Username">Username</label>
                                <input class="form-control" id="inputEmailEnter" type="text" disabled=""
                                    value ="{{ $username }}" placeholder="Enter Username">
                                @error('username')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="Enter Amount">Enter Amount</label>
                                <input class="form-control" id="Enter Amount" type="number" step="any"
                                    wire:model="balance" placeholder="Enter Amount">
                                @error('balance')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="Member List">Debit Options</label>
                                <select class="form-control" id="exampleFormControlSelect1"
                                    wire:model="debitCondition">
                                    <option value="1">Increase</option>
                                    <option value="0">Decrease</option>
                                </select>
                                @error('debitCondition')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                                <button class="btn btn-danger" wire:click="debitcloseModal" type="button"
                                    data-bs-dismiss="modal" style="position:absolute; right:10px;">Close </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endif
    <!-- Add Debit end -->
    <!-- user all options -->
    @if ($optionClose)
        <div class="modal fade bd-example-modal-lg show" tabindex="-1" aria-labelledby="myExtraLargeModal"
            style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myExtraLargeModal">User All Options</h4>
                        <button class="btn-close py-0" type="button" wire:click="optionsClose"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <style>
                            .btn-square {
                                margin: 5px;
                            }
                        </style>
                        <button type="button"
                            class="btn btn-square btn-primary btn-lg animate__animated animate__bounceIn"
                            wire:click="editMember({{ $memberId }})">Edit</button>
                        <button type="button"
                            class="btn btn-square btn-warning btn-lg animate__animated animate__bounceIn"
                            wire:click="debitopenModal({{ $memberId }})">Add Debit</button>
                        <button type="button"
                            class="btn btn-square btn-info btn-lg animate__animated animate__bounceIn"
                            wire:click="bankopenModal({{ $memberId }})">Card Information</button>
                        <a href="trade/withdrawlist?username={{ $username }}">
                            <button type="button"
                                class="btn btn-square btn-info btn-lg animate__animated animate__bounceIn">Withdraw
                                Record</button>
                        </a>
                        <a href="trade/rechargelist?username={{ $username }}">
                            <button type="button"
                                class="btn btn-square btn-secondary btn-lg animate__animated animate__bounceIn">Recharge
                                Record</button>
                        </a>
                        <a href="member/continuousOrder/?uid={{ $memberId }}">
                            <button type="button"
                                class="btn btn-square btn-warning btn-lg animate__animated animate__bounceIn">Set
                                Premium</button>
                        </a>
                        <button type="button"
                            class="btn btn-square btn-danger btn-lg animate__animated animate__bounceIn"
                            wire:click="resetoders({{ $memberId }})">Reset journey</button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" wire:click="optionsClose"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    @endif
    <!-- user all options end -->
    <!-- user edit model -->
    @if ($addeditmodel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog"
            aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myExtraLargeModal">Edit Member</h4>
                        <button class="btn-close py-0" type="button" wire:click="EditcloseModal"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                            <p> Fill in your information below to continue.</p>
                            <form class="row g-3" wire:submit.prevent="updates({{ $memberId }})">
                                <div class="col-md-12">
                                    <label class="form-label" for="Username">Username</label>
                                    <input class="form-control" id="inputEmailEnter" type="text" disabled=""
                                        value ="{{ $username }}" placeholder="Enter Username">
                                    @error('username')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($memberlevels)
                                    <div class="col-md-12">
                                        <label class="form-label" for="Member List">Select Level</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            wire:model="level">
                                            @foreach ($memberlevels as $memberlevel)
                                                <option value="{{ $memberlevel->level }}">{{ $memberlevel->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('level')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <label class="form-label" for="ParentID">Parent ID</label>
                                    <input class="form-control" id="ParentID" type="text"
                                        wire:model="inviteCode" placeholder="Parent ID">
                                    @error('inviteCode')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    @if ($inviteCodeCheck)
                                        <span style="color: red;">Your Code Incorrect</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Balance">Balance</label>
                                    <input class="form-control" id="Balance" type="text" wire:model="balance"
                                        placeholder="Balance">
                                    @error('balance')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Mobile phone number">Mobile phone number</label>
                                    <input class="form-control" id="Mobile phone number" type="text"
                                        wire:model="ph" placeholder="Mobile phone number">
                                    @error('ph')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Password">Password</label>
                                    <input class="form-control" id="Password" type="text" wire:model="password"
                                        placeholder="Password">
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Payment password">Payment password</label>
                                    <input class="form-control" id="Payment password" type="text"
                                        wire:model="payPassword" placeholder="Payment password">
                                    @error('payPassword')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <p class="form-label"><strong>Whether to allow rob order</strong></p>
                                    <label class="switch">
                                        <input type="checkbox" wire:model="orderStatus"
                                            {{ $orderStatus ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>

                                <div class="col-md-12">
                                    <p class="form-label"><strong>Whether to allow withdrawal</strong></p>
                                    <label class="switch">
                                        <input type="checkbox" wire:model="withdrawalStatus"
                                            {{ $withdrawalStatus ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>

                                <div class="col-md-12">
                                    <p class="form-label"><strong>First Task Level</strong></p>
                                    <label class="switch">
                                        <input type="checkbox" wire:model="taskStatus"
                                            {{ $taskStatus ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <button class="btn btn-danger" wire:click="EditcloseModal()" type="button"
                                        data-bs-dismiss="modal" style="position:absolute; right:10px;">Close </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- user edit model end -->
    <!-- add new model -->
    @if ($addnewmodel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog"
            aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myExtraLargeModal">Add Member</h4>
                        <button class="btn-close py-0" type="button" wire:click="addcloseModal"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                            <p> Fill in your information below to continue.</p>
                            <form class="row g-3" wire:submit.prevent="AddNewMember()">
                                <div class="col-md-12">
                                    <label class="form-label" for="Username">Username</label>
                                    <input class="form-control" id="inputEmailEnter" type="text"
                                        wire:model="username" placeholder="Enter Username">
                                    @error('username')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($memberlevels)
                                    <div class="col-md-12">
                                        <label class="form-label" for="Member List">Select Level</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            wire:model="level">
                                            @foreach ($memberlevels as $memberlevel)
                                                <option value="{{ $memberlevel->level }}">{{ $memberlevel->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('level')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <label class="form-label" for="ParentID">Parent ID</label>
                                    <input class="form-control" id="ParentID" type="text"
                                        wire:model="inviteCode" placeholder="Parent ID">
                                    @error('inviteCode')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    @if ($inviteCodeCheck)
                                        <span style="color: red;">Your Code Incorrect</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Balance">Balance</label>
                                    <input class="form-control" id="Balance" type="text" wire:model="balance"
                                        placeholder="Balance">
                                    @error('balance')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Mobile phone number">Mobile phone number</label>
                                    <input class="form-control" id="Mobile phone number" type="text"
                                        wire:model="ph" placeholder="Mobile phone number">
                                    @error('ph')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Password">Password</label>
                                    <input class="form-control" id="Password" type="text" wire:model="password"
                                        placeholder="Password">
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Payment password">Payment password</label>
                                    <input class="form-control" id="Payment password" type="text"
                                        wire:model="payPassword" placeholder="Payment password">
                                    @error('payPassword')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p class="form-label"><strong>Whether to allow rob order</strong></p>
                                    <label class="switch">
                                        <input type="checkbox" wire:model="orderStatus">
                                        <span class="slider"></span>
                                    </label>
                                </div>

                                <div class="col-md-12">
                                    <p class="form-label"><strong>Whether to allow withdrawal</strong></p>
                                    <label class="switch">
                                        <input type="checkbox" wire:model="withdrawalStatus" class="editwithdraw">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Add New</button>
                                    <button class="btn btn-danger" wire:click="addcloseModal" type="button"
                                        data-bs-dismiss="modal" style="position:absolute; right:10px;">Close </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- add new model end-->
    <style>
        table th {
            white-space: nowrap;
        }

        table th:first-child,
        table td:first-child {
            position: sticky;
            left: 0;
            background-color: #343a40;
            /* Dark background */
            color: white;
            /* White text color */
            box-shadow: 2px 0 5px -2px rgba(0, 0, 0, 0.3);
            z-index: 1;
            /* Ensure it is above other table cells */
        }

        table th:first-child {
            z-index: 2;
            /* Higher than td to stay above on scroll */
        }

        table th:last-child,
        table td:last-child {
            position: sticky;
            right: 0;
            background-color: #343a40;
            /* Dark background */
            color: white;
            /* White text color */
            box-shadow: 2px 0 5px -2px rgba(0, 0, 0, 0.3);
            z-index: 1;
            /* Ensure it is above other table cells */
        }

        table th:last-child {
            z-index: 2;
            /* Higher than td to stay above on scroll */
        }

        button:hover::before {
            transform: translate(-50%, -50%) scale(0.4);
            transition: transform 0.5s ease;
        }

        button::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s ease;
        }

        button:hover {
            background-color: #3700b3;
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }


        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #007bff;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #007bff;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .alert {
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        #alertCheckbox:checked+.alert {
            opacity: 0;
            transition: opacity 0.5s ease-in-out 3s;
            /* Delay the transition */
        }

        /* Hidden checkbox */
        #alertCheckbox {
            display: none;
        }

        /* Alert box styling */
        .alert {
            background-color: #f44336;
            /* Red */
            color: white;
            padding: 15px;
            margin-bottom: 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        /* Animation keyframes */
        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        /* Apply animation */
        .alert.auto-close {
            animation: fadeOut 3s forwards 3s;
            /* 3s delay, then fade out over 3s */
        }
    </style>


</div>
</div>
