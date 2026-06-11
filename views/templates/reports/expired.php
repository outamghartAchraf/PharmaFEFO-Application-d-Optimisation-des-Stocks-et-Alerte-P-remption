<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expired Products Report - PharmaFEFO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-blue-500 selection:text-white">

<div class="flex h-screen w-screen overflow-hidden">

    <aside class="w-60 bg-slate-900 text-white flex flex-col flex-shrink-0 border-r border-slate-800 hidden md:flex">
        
        <div class="p-5 border-b border-slate-800 flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-600/15 border border-blue-500/30 flex items-center justify-center">
                <i class="fa-solid fa-capsules text-blue-400 text-xl"></i>
            </div>
            <div>
                <h1 class="text-sm font-bold tracking-tight text-white">PharmaFEFO</h1>
                <p class="text-[11px] text-slate-500 font-medium tracking-wide">FEFO Management</p>
            </div>
        </div>

        <nav class="flex-1 p-3 flex flex-col gap-1 overflow-y-auto">
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-800/50 font-medium text-sm transition-all group">
                <i class="fa-solid fa-chart-pie text-base w-5 text-center text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                <span>Dashboard</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-800/50 font-medium text-sm transition-all group">
                <i class="fa-solid fa-pills text-base w-5 text-center text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                <span>Products</span>
            </a>

            <a href="index.php?action=batch_index" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-800/50 font-medium text-sm transition-all group">
                <i class="fa-solid fa-boxes-stacked text-base w-5 text-center text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                <span>Batches</span>
            </a>

            <a href="index.php?action=stock_index" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-800/50 font-medium text-sm transition-all group">
                <i class="fa-solid fa-arrow-right-arrow-left text-base w-5 text-center text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                <span>Stock Movements</span>
            </a>

            <a href="index.php?action=notifications_index" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-800/50 font-medium text-sm transition-all group">
                <i class="fa-solid fa-bell text-base w-5 text-center text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                <span>Notifications</span>
            </a>

            <a href="index.php?action=report_dashboard" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg bg-blue-600 text-white font-medium text-sm transition-all shadow-sm shadow-blue-600/10">
                <i class="fa-solid fa-file-lines text-base w-5 text-center"></i>
                <span>Reports</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-800/50 font-medium text-sm transition-all group">
                <i class="fa-solid fa-users text-base w-5 text-center text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                <span>Users</span>
            </a>
        </nav>

        <div class="p-3 border-t border-slate-800">
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-rose-400 hover:text-rose-300 hover:bg-rose-500/10 font-medium text-sm transition-all">
                <i class="fa-solid fa-right-from-bracket text-base w-5 text-center"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        <header class="bg-white border-b border-slate-200 px-6 py-4 flex justify-between items-center z-10 flex-shrink-0">
            <div class="flex items-center gap-4">
                <a href="index.php?action=report_dashboard" 
                   class="w-9 h-9 flex items-center justify-center rounded-lg border border-slate-200 bg-slate-50 text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-all"
                   title="Back to Reports Overview">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                </a>
                <div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-ban text-rose-500 text-sm"></i>
                        <h2 class="text-xl font-bold text-slate-900 tracking-tight">Expired Products Report</h2>
                    </div>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Historical ledger data of all batches that have reached or exceeded validation deadlines.</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2.5 pl-2.5 pr-3.5 py-1.5 rounded-full border border-slate-200 bg-slate-50 cursor-default">
                    <div class="w-7 h-7 rounded-full bg-blue-100 border border-blue-200 flex items-center justify-center text-[11px] font-bold text-blue-700 shadow-sm">
                        AU
                    </div>
                    <span class="text-xs font-semibold text-slate-700">Admin User</span>
                </div>
            </div>
        </header>

        <main class="flex-1 p-4 md:p-6 lg:p-8 overflow-y-auto space-y-4">

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                <th class="py-3.5 px-5">Product Molecule Name</th>
                                <th class="py-3.5 px-5 w-40">CIP Identifier</th>
                                <th class="py-3.5 px-5 w-40">Batch Line Ref</th>
                                <th class="py-3.5 px-5 w-48">Expired Date Matrix</th>
                                <th class="py-3.5 px-5 text-right w-36">Available Qty</th>
                                <th class="py-3.5 px-5 text-center w-32">Status Label</th>
                            </tr>
                        </thead>

                        <tbody class="text-xs divide-y divide-slate-100 text-slate-700 font-medium">

                        <?php if (!empty($reports)): ?>
                            <?php foreach ($reports as $r): ?>

                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    
                                    <td class="py-4 px-5 font-bold text-slate-900 text-sm tracking-tight">
                                        <?= htmlspecialchars($r->product_name) ?>
                                    </td>

                                    <td class="py-4 px-5 text-slate-500 font-mono tracking-tight">
                                        <?= htmlspecialchars($r->cip_code) ?>
                                    </td>

                                    <td class="py-4 px-5 font-mono font-bold text-slate-600">
                                        <?= htmlspecialchars($r->batch_number) ?>
                                    </td>

                                    <td class="py-4 px-5 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-rose-50 text-rose-700 border border-rose-100 font-bold tracking-tight">
                                            <i class="fa-regular fa-calendar-times text-rose-500"></i>
                                            <?= $r->expiration_date ?>
                                        </span>
                                    </td>

                                    <td class="py-4 px-5 text-right font-extrabold text-sm text-rose-600 tracking-tight">
                                        <?= number_format((int) $r->qty_available) ?>
                                    </td>

                                    <td class="py-4 px-5 text-center whitespace-nowrap">
                                        <span class="inline-flex items-center bg-rose-100 border border-rose-200 text-rose-700 px-2.5 py-0.5 rounded-full font-extrabold text-[10px] tracking-wide uppercase">
                                            Expired
                                        </span>
                                    </td>

                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>

                            <tr>
                                <td colspan="6" class="py-16 px-5 text-center">
                                    <div class="flex flex-col items-center justify-center gap-2.5 max-w-sm mx-auto">
                                        <div class="w-11 h-11 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 border border-slate-100">
                                            <i class="fa-solid fa-shield-halved text-emerald-500"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-slate-800">No expired items found</p>
                                            <p class="text-xs text-slate-400 mt-0.5">There are no isolated product batches currently reporting lifecycle timeouts on this matrix register loop.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</div>

</body>
</html>