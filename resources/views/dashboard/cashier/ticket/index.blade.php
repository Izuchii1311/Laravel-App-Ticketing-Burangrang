{{-- ? Dashboard Layouts --}}
@extends('dashboard.layouts.main')

{{-- ? Title --}}
@section('title', "Dashboard | Data Tiket")

{{-- ? Content --}}
@section('content')
    <div class="card bg-transparent shadow-none border-0 my-4">
        <div class="card-body row p-0">
            {{-- * Information --}}
            <div class="col-12 col-md-8 card-separator">
                <h3>Selamat datang kembali, {{ auth()->user()->name }} 👋🏻 </h3>
                <div class="col-12 col-lg-8">
                    <p>Kamu bisa menambahkan tiket baru untuk menyesuaikan kemudahan dalam pengelolaan tiket kawasan g.Burangrang</p>
                </div>

                {{-- * Alert --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="menu-icon tf-icons bx bx-check me-2 mb-1"></i>
                        <strong>Selamat</strong>, Kamu {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('warning'))
                    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="menu-icon tf-icons bx bx-info-circle me-2 mb-1"></i>
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mx-4" role="alert">
                        <i class="menu-icon tf-icons bx bx-error-circle me-2 mb-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            {{-- * Create Ticket --}}
            <div class="col-12 col-md-4 ps-md-3 ps-lg-5 pt-3 pt-md-0">
                <div class="d-flex justify-content-between align-items-center" style="position: relative;">
                    <div>
                        <div>
                            <h5 class="mb-2"><a href="{{ route('ticket.create') }}">Tambah Tiket Baru</a></h5>
                            <p class="mb-4">Weekly report</p>
                        </div>
                        <div class="time-spending-chart">
                            <h3 class="mb-2">231<span class="text-muted">h</span> 14<span class="text-muted">m</span> </h3>
                            <span class="badge bg-label-success">+18.4%</span>
                        </div>
                    </div>
                    <div id="leadsReportChart" style="min-height: 139.8px;"><div id="apexchartsgyqwerjr" class="apexcharts-canvas apexchartsgyqwerjr apexcharts-theme-light" style="width: 130px; height: 139.8px;"><svg id="SvgjsSvg1636" width="130" height="139.8" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1638" class="apexcharts-inner apexcharts-graphical" transform="translate(-0.5, 0)"><defs id="SvgjsDefs1637"><clipPath id="gridRectMaskgyqwerjr"><rect id="SvgjsRect1640" width="137" height="155" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskgyqwerjr"></clipPath><clipPath id="nonForecastMaskgyqwerjr"></clipPath><clipPath id="gridRectMarkerMaskgyqwerjr"><rect id="SvgjsRect1641" width="137" height="159" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1642" class="apexcharts-pie"><g id="SvgjsG1643" transform="translate(0, 0) scale(1)"><circle id="SvgjsCircle1644" r="45.658536585365866" cx="66.5" cy="66.5" fill="transparent"></circle><g id="SvgjsG1645" class="apexcharts-slices"><g id="SvgjsG1646" class="apexcharts-series apexcharts-pie-series" seriesName="36h" rel="1" data:realIndex="0"><path id="SvgjsPath1647" d="M 66.5 5.621951219512184 A 60.878048780487816 60.878048780487816 0 0 1 117.38951211290043 33.087511612715616 L 104.66713408467533 41.44063370953671 A 45.658536585365866 45.658536585365866 0 0 0 66.5 20.841463414634134 L 66.5 5.621951219512184 z" fill="#71dd37e8" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="56.71232876712329" data:startAngle="0" data:strokeWidth="0" data:value="23" data:pathOrig="M 66.5 5.621951219512184 A 60.878048780487816 60.878048780487816 0 0 1 117.38951211290043 33.087511612715616 L 104.66713408467533 41.44063370953671 A 45.658536585365866 45.658536585365866 0 0 0 66.5 20.841463414634134 L 66.5 5.621951219512184 z"></path></g><g id="SvgjsG1648" class="apexcharts-series apexcharts-pie-series" seriesName="56h" rel="2" data:realIndex="1"><path id="SvgjsPath1649" d="M 117.38951211290043 33.087511612715616 A 60.878048780487816 60.878048780487816 0 0 1 103.12569906852212 115.12812962742359 L 93.9692743013916 102.97109722056769 A 45.658536585365866 45.658536585365866 0 0 0 104.66713408467533 41.44063370953671 L 117.38951211290043 33.087511612715616 z" fill="#71dd37bf" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="86.30136986301369" data:startAngle="56.71232876712329" data:strokeWidth="0" data:value="35" data:pathOrig="M 117.38951211290043 33.087511612715616 A 60.878048780487816 60.878048780487816 0 0 1 103.12569906852212 115.12812962742359 L 93.9692743013916 102.97109722056769 A 45.658536585365866 45.658536585365866 0 0 0 104.66713408467533 41.44063370953671 L 117.38951211290043 33.087511612715616 z"></path></g><g id="SvgjsG1650" class="apexcharts-series apexcharts-pie-series" seriesName="16h" rel="3" data:realIndex="2"><path id="SvgjsPath1651" d="M 103.12569906852212 115.12812962742359 A 60.878048780487816 60.878048780487816 0 0 1 79.49873670579831 125.9741092188255 L 76.24905252934873 111.10558191411914 A 45.658536585365866 45.658536585365866 0 0 0 93.9692743013916 102.97109722056769 L 103.12569906852212 115.12812962742359 z" fill="rgba(113,221,55,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="24.657534246575352" data:startAngle="143.013698630137" data:strokeWidth="0" data:value="10" data:pathOrig="M 103.12569906852212 115.12812962742359 A 60.878048780487816 60.878048780487816 0 0 1 79.49873670579831 125.9741092188255 L 76.24905252934873 111.10558191411914 A 45.658536585365866 45.658536585365866 0 0 0 93.9692743013916 102.97109722056769 L 103.12569906852212 115.12812962742359 z"></path></g><g id="SvgjsG1652" class="apexcharts-series apexcharts-pie-series" seriesName="32h" rel="4" data:realIndex="3"><path id="SvgjsPath1653" d="M 79.49873670579831 125.9741092188255 A 60.878048780487816 60.878048780487816 0 0 1 29.87430093147789 115.12812962742359 L 39.03072569860842 102.9710972205677 A 45.658536585365866 45.658536585365866 0 0 0 76.24905252934873 111.10558191411914 L 79.49873670579831 125.9741092188255 z" fill="#71dd3799" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-3" index="0" j="3" data:angle="49.315068493150676" data:startAngle="167.67123287671234" data:strokeWidth="0" data:value="20" data:pathOrig="M 79.49873670579831 125.9741092188255 A 60.878048780487816 60.878048780487816 0 0 1 29.87430093147789 115.12812962742359 L 39.03072569860842 102.9710972205677 A 45.658536585365866 45.658536585365866 0 0 0 76.24905252934873 111.10558191411914 L 79.49873670579831 125.9741092188255 z"></path></g><g id="SvgjsG1654" class="apexcharts-series apexcharts-pie-series" seriesName="56h" rel="5" data:realIndex="4"><path id="SvgjsPath1655" d="M 29.87430093147789 115.12812962742359 A 60.878048780487816 60.878048780487816 0 0 1 15.61048788709956 33.08751161271562 L 28.332865915324668 41.44063370953671 A 45.658536585365866 45.658536585365866 0 0 0 39.03072569860842 102.9710972205677 L 29.87430093147789 115.12812962742359 z" fill="#71dd3766" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-4" index="0" j="4" data:angle="86.30136986301372" data:startAngle="216.986301369863" data:strokeWidth="0" data:value="35" data:pathOrig="M 29.87430093147789 115.12812962742359 A 60.878048780487816 60.878048780487816 0 0 1 15.61048788709956 33.08751161271562 L 28.332865915324668 41.44063370953671 A 45.658536585365866 45.658536585365866 0 0 0 39.03072569860842 102.9710972205677 L 29.87430093147789 115.12812962742359 z"></path></g><g id="SvgjsG1656" class="apexcharts-series apexcharts-pie-series" seriesName="16h" rel="6" data:realIndex="5"><path id="SvgjsPath1657" d="M 15.61048788709956 33.08751161271562 A 60.878048780487816 60.878048780487816 0 0 1 66.48937477611985 5.621952146737883 L 66.49203108208988 20.84146411005341 A 45.658536585365866 45.658536585365866 0 0 0 28.332865915324668 41.44063370953671 L 15.61048788709956 33.08751161271562 z" fill="#71dd3733" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-5" index="0" j="5" data:angle="56.71232876712327" data:startAngle="303.28767123287673" data:strokeWidth="0" data:value="23" data:pathOrig="M 15.61048788709956 33.08751161271562 A 60.878048780487816 60.878048780487816 0 0 1 66.48937477611985 5.621952146737883 L 66.49203108208988 20.84146411005341 A 45.658536585365866 45.658536585365866 0 0 0 28.332865915324668 41.44063370953671 L 15.61048788709956 33.08751161271562 z"></path></g></g></g><g id="SvgjsG1658" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1659" font-family="Helvetica, Arial, sans-serif" x="66.5" y="86.5" text-anchor="middle" dominant-baseline="auto" font-size=".7rem" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif; fill: rgb(161, 172, 184);">Total</text><text id="SvgjsText1660" font-family="Public Sans" x="66.5" y="67.5" text-anchor="middle" dominant-baseline="auto" font-size="1.5rem" font-weight="500" fill="#566a7f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: &quot;Public Sans&quot;;">231h</text></g></g><line id="SvgjsLine1661" x1="0" y1="0" x2="133" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1662" x1="0" y1="0" x2="133" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1639" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-false" style="left: -818.133px; top: -169.359px;"><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex; background-color: rgba(113, 221, 55, 0.4);"><span class="apexcharts-tooltip-marker" style="background-color: rgba(113, 221, 55, 0.4); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">56h: </span><span class="apexcharts-tooltip-text-y-value">35</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2; display: none; background-color: rgba(113, 221, 55, 0.4);"><span class="apexcharts-tooltip-marker" style="background-color: rgba(113, 221, 55, 0.4); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">56h: </span><span class="apexcharts-tooltip-text-y-value">35</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3; display: none; background-color: rgba(113, 221, 55, 0.4);"><span class="apexcharts-tooltip-marker" style="background-color: rgba(113, 221, 55, 0.4); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">56h: </span><span class="apexcharts-tooltip-text-y-value">35</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 4; display: none; background-color: rgba(113, 221, 55, 0.4);"><span class="apexcharts-tooltip-marker" style="background-color: rgba(113, 221, 55, 0.4); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">56h: </span><span class="apexcharts-tooltip-text-y-value">35</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 5; display: none; background-color: rgba(113, 221, 55, 0.4);"><span class="apexcharts-tooltip-marker" style="background-color: rgba(113, 221, 55, 0.4); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">56h: </span><span class="apexcharts-tooltip-text-y-value">35</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 6; display: none; background-color: rgba(113, 221, 55, 0.4);"><span class="apexcharts-tooltip-marker" style="background-color: rgba(113, 221, 55, 0.4); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">56h: </span><span class="apexcharts-tooltip-text-y-value">35</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 280px; height: 141px;"></div></div><div class="contract-trigger"></div></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 mb-0">
            {{-- * Card --}}
            <div class="card">
                {{-- * Information --}}
                <h5 class="card-header fw-bolder">Data Tiket</h5>
                <div class="card-datatable table-responsive">
                    {{-- * Table --}}
                    <table class="invoice-list-table table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Tiket</th>
                                <th>Nama Tiket</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Jam Buka</th>
                                <th>Jam Tutup</th>
                                <th class="cell-fit">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($tickets as $ticket)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ticket->cd_ticket }}</td>
                                    <td>{{ $ticket->name_ticket }}</td>
                                    <td>{{ $ticket->price }}</td>
                                    <td>
                                        @if ($ticket->status === 'open')
                                            <span class="badge bg-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->start_time }}</td>
                                    <td>{{ $ticket->end_time }}</td>
                                    <td>
                                        {{-- * Dropdown --}}
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown">
                                                <a href="" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('ticket.show', ['ticket' => $ticket->cd_ticket]) }}" class="dropdown-item">
                                                        Detail Tiket
                                                    </a>
                                                    <a href="{{ route('ticket.edit', ['ticket' => $ticket->cd_ticket]) }}" class="dropdown-item">
                                                        Edit Tiket
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    {{-- ! Delete Ticket --}}
                                                    <form action="{{ route('ticket.destroy', ['ticket' => $ticket->cd_ticket]) }}" method="post" id="confirm-delete-{{ $ticket->cd_ticket }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" onclick="confirmDelete('{{ $ticket->cd_ticket }}')" class="dropdown-item delete-record text-danger fw-bolder">Hapus Tiket</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="8" class="text-center py-5">
                                        <p class="">
                                            <h3>Tidak ada tiket.</h3>
                                            <a href="{{ route('ticket.create') }}" class="text-secondary">Buat ticket baru</a>
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
{{-- ? End Content --}}