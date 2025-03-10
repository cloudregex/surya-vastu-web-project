<!-- Start::row-1 dynamic-table.blade.php -->
<div class="row row-sm mt-3">
    <div class="col-xl-12">
        <div class="card custom-card">
            <x-session-msg />
            <div class="card-header p-2 border-bottom d-flex justify-content-between">
                <div class="card-title p-2">
                    {{ $listName }}<span class="badge bg-primary-transparent rounded-pill fw-medium"
                        style="margin-left: 5px;padding: 7px 10px !important; rounded-pill">
                        {{ $array->total() }}
                        Records</span>
                </div>

                <div>
                    @if ($trashRoute)
                        <x-a-link target="{{ $trashRoute }}" href="{{ route($trashRoute) }}" color="danger"
                            name="Trash Data" icon='<i class="bi bi-trash"></i>' />
                    @endif
                    @if (isset($filter_data))
                        <a class="btn btn-primary border-dark btn-sm btn-raised-shadow btn-wave" data-bs-toggle="modal"
                            href="#FilterModal"><i class="bi bi-filter"></i> Filters</a>
                    @endif
                    @if ($createRoute)
                        <x-a-link target="{{ $createRoute }}" href="{{ route($createRoute) }}" color="success"
                            name="{{ $createButton }}" icon='{!! $icon !!}' />
                    @endif
                </div>
            </div>
            @if (collect($filters)->contains(fn($value) => $value))
                <div class="mx-3 border-bottom">
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-2" style="margin-bottom: -5px;">
                        <ul style="padding-left:0rem;">
                            <!-- Show "Active Filters" button first -->
                            <button class="btn btn-sm btn-primary label-btn label-end rounded-pill my-1"
                                style="margin-right: 20px">
                                Active Filters
                                <i class="bi bi-funnel label-btn-icon ms-2 rounded-pill"></i>
                            </button>

                            <!-- Display individual filter buttons -->
                            @foreach ($filters as $key => $value)
                                @if (is_array($value) && count($value) > 0)
                                    <button class="btn btn-sm btn-primary-transparent label-btn label-end rounded-pill">
                                        {{ str_replace('_', ' ', ucfirst($key)) }}: {{ implode(', ', $value) }}
                                        <i class="ri-close-line label-btn-icon ms-2 rounded-pill"
                                            wire:click="resetFilters('{{ $key }}')"></i>
                                    </button>
                                @elseif (is_string($value) && !is_null($value) && $value !== '')
                                    <button class="btn btn-sm btn-primary-transparent label-btn label-end rounded-pill">
                                        {{ str_replace('_', ' ', ucfirst($key)) }}:
                                        {{ str_replace('_', ' ', ucfirst(strval($value))) }}
                                        <i class="ri-close-line label-btn-icon ms-2 rounded-pill"
                                            wire:click="resetFilters('{{ $key }}')"></i>
                                    </button>
                                @endif
                            @endforeach


                            <!-- Show "Clear All" button only when filters exist -->
                            <button class="btn btn-sm btn-danger label-btn label-end rounded-pill"
                                wire:click="resetFilters()">
                                Clear All
                                <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                            </button>
                        </ul>
                    </div>
                </div>
            @endif


            <div class="card-body pt-2">
                {{ $reportsArea ?? '' }}
                <div class="table-responsive">
                    @if ($showActionButtons == true)
                        <nav role="navigation" aria-label="Pagination Navigation" class="w-100">
                            <div class="d-flex flex-column align-items-center justify-content-between">
                                <!-- Mobile and Desktop View -->
                                <div class="d-none d-sm-flex w-100 justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">

                                        <!-- Export Options Dropdown -->
                                        <div class="dropdown  me-2" data-bs-toggle="tooltip" title="Export Table Data">
                                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-cloud-download-alt me-1"></i> Exports
                                            </button>
                                            <ul class="dropdown-menu p-2" aria-labelledby="exportDropdown">
                                                <li>
                                                    <button class="dropdown-item" id="pdfButton">
                                                        <i class="bi bi-file-earmark-pdf text-danger"></i>
                                                        Export PDF
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" onclick="printTable()">
                                                        <i class="bi bi-printer"></i> Print Table
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" onclick="exportToCSV()">
                                                        <i class="bi bi-file-earmark-spreadsheet text-success"></i>
                                                        Export CSV
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" onclick="exportToExcel()">
                                                        <i class="bi bi-file-earmark-excel text-warning"></i> Export
                                                        Excel
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Hide Columns Dropdown -->
                                        <div class="dropdown" data-bs-toggle="tooltip"
                                            title="Select columns to exclude from export">
                                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                                id="toggleColumnDropdown" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="far fa-minus-square me-1"></i> Columns
                                            </button>
                                            <ul class="dropdown-menu p-2" aria-labelledby="toggleColumnDropdown">
                                                @foreach ($arrayThead as $key => $item)
                                                    <li>
                                                        <div class="form-check px-3">
                                                            <input type="checkbox"
                                                                class="form-check-input form-checked-success"
                                                                id="toggle_{{ str_replace([' ', '.'], '_', $item['th']) }}"
                                                                checked onchange="toggleColumn({{ $key }})">
                                                            <label class="form-check-label"
                                                                for="toggle_{{ str_replace([' ', '.'], '_', $item['th']) }}">{{ $item['th'] }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div>
                                        <input wire:model.live.debounce.300ms="Search" type="text"
                                            class="form-control form-control-sm" id="search"
                                            placeholder="Search anything..." style="width: 250px;">
                                    </div>
                                </div>
                            </div>
                        </nav>
                    @endif
                    <div class="table-responsive">
                        <table id="contentToExport" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr class="bg-gray">
                                    @foreach ($arrayThead as $item)
                                        @if (isset($item['sort']))
                                            <th wire:click="setSortBy('{{ $item['sort'] }}')"
                                                style="cursor: pointer; width:200px !important;">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span style="font-weight: bold;">{{ $item['th'] }}</span>
                                                    <span class="float-end">
                                                        @if ($sortBy != $item['sort'])
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="ml-2"
                                                                style="width: 1.5em; height: 1.5em;">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                            </svg>
                                                        @elseif($sortDir === 'ASC')
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="ml-2"
                                                                style="width: 1em; height: 1em;">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="ml-2"
                                                                style="width: 1em; height: 1em;">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                            </svg>
                                                        @endif
                                                    </span>
                                                </div>
                                            </th>
                                        @else
                                            <th>
                                                {{ $item['th'] }}
                                            </th>
                                        @endif
                                        @push('styles')
                                            @if ($item['th'] == 'Action')
                                                <style>
                                                    th:last-child,
                                                    td:last-child {
                                                        position: sticky;
                                                        right: 0;
                                                        z-index: 2;
                                                        background-color: inherit;
                                                    }

                                                    td:last-child,
                                                    th:last-child {
                                                        background-color: var(--custom-white) !important;
                                                    }
                                                </style>
                                            @endif
                                        @endpush
                                    @endforeach

                                </tr>
                            </thead>
                            <tbody>
                                {{ $tbody }}
                            </tbody>
                        </table>
                        @if (count($array) == 0)
                            <div class="text-center p-5 m-5">
                                <i class="bi bi-folder display-1 text-primary"></i>
                                <br />
                                <h2 class="mt-3">
                                    @if (collect($filters)->contains(fn($value) => $value))
                                        Oops! We couldn’t find any results.
                                    @else
                                        No records available.
                                    @endif
                                </h2>
                            </div>
                        @endif
                    </div>
                    <div class="border-top"></div>
                    <div class="d-flex justify-content-center my-3">
                        <nav role="navigation" aria-label="Pagination Navigation" class="w-100">
                            <div class="d-flex flex-column align-items-center justify-content-between">
                                <!-- Mobile and Desktop View -->
                                <div class="d-sm-flex w-100 justify-content-between align-items-center">
                                    <div class="d-flex align-items-center mb-2">
                                        <label for="perPage" class="me-2 text-muted">Show:</label>
                                        <select id="perPage" wire:model.live="perPage" class="form-select me-3"
                                            aria-label="Items per page">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        Showing <strong>&nbsp;{{ $array->firstItem() }}&nbsp;</strong> to
                                        <strong>&nbsp;{{ $array->lastItem() }}&nbsp;</strong> of
                                        <strong>&nbsp;{{ $array->total() }}&nbsp;</strong> results
                                    </div>
                                    <div>
                                        <div wire:loading>
                                            <span class="wireloading">
                                                <img src="{{ asset('assets/images/media/loader.svg') }}"
                                                    alt="loading">
                                            </span>
                                        </div>
                                        <ul class="pagination mb-0">
                                            <li class="page-item {{ $array->onFirstPage() ? 'disabled' : '' }}">
                                                <button type="button" wire:click="previousPage" class="page-link"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </button>
                                            </li>

                                            @php
                                                $currentPage = $array->currentPage();
                                                $lastPage = $array->lastPage();
                                                $showingEllipsis = false;
                                            @endphp

                                            @for ($page = 1; $page <= $lastPage; $page++)
                                                @if ($page <= 3 || $page > $lastPage - 3 || ($page >= $currentPage - 1 && $page <= $currentPage + 1))
                                                    <li class="page-item {{ $page == $currentPage ? 'active' : '' }}">
                                                        <button type="button"
                                                            wire:click="gotoPage({{ $page }})"
                                                            class="page-link">{{ $page }}</button>
                                                    </li>
                                                    @if ($page == 3 && $currentPage > 5)
                                                        <li class="page-item disabled"><span
                                                                class="page-link">...</span></li>
                                                        @php $showingEllipsis = true; @endphp
                                                    @endif
                                                @elseif ($showingEllipsis && $page == $lastPage - 3)
                                                    <li class="page-item disabled"><span class="page-link">...</span>
                                                    </li>
                                                    @php $showingEllipsis = false; @endphp
                                                @endif
                                            @endfor

                                            <li class="page-item {{ !$array->hasMorePages() ? 'disabled' : '' }}">
                                                <button type="button" wire:click="nextPage" class="page-link"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </nav>
                    </div>
                    {{-- MODAL CODE --}}
                    <x-modal id="FilterModal" title="Filter Data" size="modal-lg">
                        {{ $filter_data ?? '' }}

                        <x-slot name="footer" wire:ignore>
                            <button type="button" class="btn btn-sm btn-danger btn-raised-shadow btn-wave"
                                data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Close</button>
                            <button type="submit" class="btn btn-sm btn-primary btn-raised-shadow btn-wave"
                                data-bs-dismiss="modal"><i class="bi bi-filter"></i> Apply Filters</button>
                        </x-slot>
                    </x-modal>
                </div>
            </div>
        </div>
        @if (isset($footerData))
            {{-- FLOATING DATA ROW --}}
            <div class="position-fixed-custom bottom-0 w-100 bg-white shadow-lg py-2">
                <div class="py-2">
                    <div class="d-flex justify-content-center flex-wrap gap-3">
                        {{ $footerData ?? '' }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    @push('scripts')
        {{-- datatable --}}
        <script src="{{ asset('assets/datatable/html2pdf.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/datatable/print.min.js') }}"></script>
        <script src="{{ asset('assets/datatable/xlsx.full.min.js') }}"></script>
        <script>
            var cleanedThead = @json(array_column($arrayThead, 'th'));
            var Thead = cleanedThead.map(function(item) {
                return item.replace(/[\s.]/g, '_'); // Replace spaces and dots with underscores
            });
            document.getElementById('pdfButton').addEventListener('click', function() {
                const element = document.getElementById('contentToExport');

                // Hide the last column before exporting
                const lastColumnCells = element.querySelectorAll('td:last-child, th:last-child');
                lastColumnCells.forEach(cell => cell.style.display = 'none');

                // Generate PDF
                html2pdf()
                    .from(element)
                    .set({
                        margin: [0.5, 0.5, 0.5, 0.5], // Set margins
                        filename: 'document.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 3
                        },
                        jsPDF: {
                            unit: 'in',
                            format: 'letter',
                            orientation: 'landscape'
                        }
                    })
                    .save()
                    .then(() => {
                        // Restore the last column after saving
                        lastColumnCells.forEach(cell => cell.style.display = '');
                    });
            });


            function toggleColumn(index) {
                const table = document.getElementById('contentToExport');
                const rows = table.getElementsByTagName('tr');
                // Get the corresponding checkbox for the column
                const checkbox = document.querySelector(`#toggle_${Thead[index]}`);

                // Toggle visibility based on checkbox state
                const isVisible = checkbox.checked;

                // Toggle the visibility of the header cell
                const headerCells = table.getElementsByTagName('th');
                if (headerCells[index]) {
                    headerCells[index].style.display = isVisible ? '' : 'none'; // Show/Hide header cell
                }

                // Toggle the visibility of the column cells
                for (let row of rows) {
                    const cells = row.getElementsByTagName('td');
                    if (cells[index]) {
                        cells[index].style.display = isVisible ? '' : 'none'; // Show/Hide cells
                    }
                }
            }


            function printTable() {
                const table = document.getElementById('contentToExport');

                // Use Print.js to print the table
                printJS({
                    printable: 'contentToExport', // Pass the ID of the table
                    type: 'html',
                    style: `
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid #000;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                th span svg{
                display:none;
                }
            `,
                    targetStyles: ['*'], // Include all styles
                });
            }

            function exportToCSV() {
                const table = document.getElementById('contentToExport');
                let csvContent = "";

                // Get headers
                const headers = Array.from(table.querySelectorAll('th')).map((th, index) => {
                    const checkbox = document.querySelector(`#toggle_${Thead[index]}`);
                    return checkbox.checked ? th.innerText : null;
                }).filter(header => header !== null); // Filter out unchecked headers
                csvContent += headers.join(",") + "\n";

                // Get rows (starting from the first data row)
                const rows = table.querySelectorAll('tr:nth-child(n+1)'); // Include all rows after the header
                rows.forEach((row, rowIndex) => {
                    // Skip the header row
                    if (rowIndex === 0) return;

                    const cells = Array.from(row.querySelectorAll('td')).map((cell, index) => {
                        const checkbox = document.querySelector(`#toggle_${Thead[index]}`);
                        return checkbox.checked ? cell.innerText : null;
                    }).filter(cell => cell !== null); // Filter out unchecked cells
                    csvContent += cells.join(",") + "\n";
                });

                // Create a downloadable link
                const blob = new Blob([csvContent], {
                    type: 'text/csv;charset=utf-8;'
                });
                const link = document.createElement("a");
                link.href = URL.createObjectURL(blob);
                link.setAttribute("download", "permissions.csv");
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }


            function exportToExcel() {
                const table = document.getElementById('contentToExport');
                const wb = XLSX.utils.book_new();
                const wsData = [];

                // Get headers
                const headers = Array.from(table.querySelectorAll('th')).map((th, index) => {
                    const checkbox = document.querySelector(`#toggle_${Thead[index]}`);
                    return checkbox.checked ? th.innerText : null;
                }).filter(header => header !== null);
                wsData.push(headers); // Add headers to the worksheet

                // Get rows (starting from the first data row)
                const rows = table.querySelectorAll('tr:nth-child(n+1)'); // Include all rows after the header
                rows.forEach((row, rowIndex) => {
                    // Skip the header row
                    if (rowIndex === 0) return;

                    const rowData = Array.from(row.querySelectorAll('td')).map((cell, index) => {
                        const checkbox = document.querySelector(`#toggle_${Thead[index]}`);
                        return checkbox.checked ? cell.innerText : null;
                    }).filter(cell => cell !== null); // Filter out unchecked cells

                    if (rowData.length > 0) {
                        wsData.push(rowData); // Add row data to the worksheet if it has visible cells
                    }
                });

                const ws = XLSX.utils.aoa_to_sheet(wsData);
                XLSX.utils.book_append_sheet(wb, ws, 'Permissions');
                XLSX.writeFile(wb, 'permissions.xlsx');
            }
        </script>
    @endpush
</div>
<!--End::row-1 -->
