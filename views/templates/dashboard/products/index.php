<?php
$products = $products ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - PharmaFEFO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght=400;500;600;700&display=swap" rel="stylesheet">
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

            <a href="index.php?action=products_index" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg bg-blue-600 text-white font-medium text-sm transition-all shadow-sm shadow-blue-600/10">
                <i class="fa-solid fa-pills text-base w-5 text-center"></i>
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

            <a href="index.php?action=report_dashboard" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-800/50 font-medium text-sm transition-all group">
                <i class="fa-solid fa-file-lines text-base w-5 text-center text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                <span>Reports</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-800/50 font-medium text-sm transition-all group">
                <i class="fa-solid fa-users text-base w-5 text-center text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                <span>Users</span>
            </a>
        </nav>

        <div class="p-3 border-t border-slate-800">
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-rose-400 hover:text-rose-300 hover:bg-rose-50/10 font-medium text-sm transition-all">
                <i class="fa-solid fa-right-from-bracket text-base w-5 text-center"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        <header class="bg-white border-b border-slate-200 px-6 py-4 flex justify-between items-center z-10 flex-shrink-0">
            <div>
                <h2 class="text-xl font-bold text-slate-900 tracking-tight">Products Management</h2>
                <p class="text-xs text-slate-500 font-medium mt-0.5">Configure medications, master pricing index cards, and monitor minimum criteria metrics.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="index.php?action=products_create"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-bold shadow-sm shadow-blue-600/10 transition-all">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>Add Product</span>
                </a>
                <div class="h-6 w-px bg-slate-200 mx-1"></div>
                <div class="flex items-center gap-2.5 pl-1 pr-3 py-1 rounded-full border border-slate-200 bg-slate-50 cursor-default">
                    <div class="w-7 h-7 rounded-full bg-blue-100 border border-blue-200 flex items-center justify-center text-[11px] font-bold text-blue-700 shadow-sm">
                        AU
                    </div>
                    <span class="text-xs font-semibold text-slate-700">Admin User</span>
                </div>
            </div>
        </header>

        <main class="flex-1 p-4 md:p-6 lg:p-8 overflow-y-auto space-y-6">

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Registered Items</p>
                        <h3 class="text-2xl font-bold text-slate-900 mt-1.5 tracking-tight"><?= count($products) ?></h3>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-sm font-semibold">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Inventory Engine</p>
                        <h3 class="text-2xl font-bold text-emerald-600 mt-1.5 tracking-tight flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>Active</span>
                        </h3>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm font-semibold">
                        <i class="fa-solid fa-warehouse"></i>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Protocol Pipeline</p>
                        <h3 class="text-2xl font-bold text-amber-600 mt-1.5 tracking-tight">FEFO Enabled</h3>
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-sm font-semibold">
                        <i class="fa-solid fa-hourglass-start"></i>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

                <div class="p-4 bg-slate-50 border-b border-slate-200 flex items-center gap-3">
                    <div class="relative flex-1 max-w-md">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text"
                               placeholder="Filter specific molecular designation tokens or CIP keys..."
                               class="w-full bg-white border border-slate-200 rounded-lg pl-9 pr-4 py-2 text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm transition-all">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                <th class="py-3.5 px-5 w-44">CIP Identifier Token</th>
                                <th class="py-3.5 px-5">Pharmaceutical Designation Name</th>
                                <th class="py-3.5 px-5 w-40 text-right">Standard Rate Price</th>
                                <th class="py-3.5 px-5 w-44 text-right">Min Threshold Trigger</th>
                                <th class="py-3.5 px-5 text-center w-32">Control Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-xs divide-y divide-slate-100 text-slate-700 font-medium">

                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>

                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    
                                    <td class="py-4 px-5 font-mono font-bold text-slate-500 tracking-tight">
                                        <?= htmlspecialchars($product->cip_code) ?>
                                    </td>

                                    <td class="py-4 px-5 font-bold text-slate-900 text-sm tracking-tight">
                                        <?= htmlspecialchars($product->designation) ?>
                                    </td>

                                    <td class="py-4 px-5 text-right font-extrabold text-slate-900 tracking-tight text-sm">
                                        <?= number_format($product->price, 2) ?> <span class="text-xs font-bold text-slate-400 ml-0.5">DH</span>
                                    </td>

                                    <td class="py-4 px-5 text-right whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-slate-100 text-slate-700 font-bold tracking-tight">
                                            <i class="fa-solid fa-bell-concierge text-slate-400 text-[10px]"></i>
                                            <?= number_format((int)$product->min_stock_alert) ?> units
                                        </span>
                                    </td>

                                    <td class="py-4 px-5 text-center whitespace-nowrap">
                                        <div class="flex justify-center items-center gap-1.5">
                                            <a href="index.php?action=products_edit&id=<?= $product->id ?>"
                                               class="w-8 h-8 flex items-center justify-center bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 hover:text-blue-600 transition-all shadow-sm"
                                               title="Modify Registry Properties">
                                                <i class="fa-solid fa-pen text-[11px]"></i>
                                            </a>

                                            <a href="index.php?action=products_delete&id=<?= $product->id ?>"
                                               onclick="return confirm('Confirm permanent erasure of this molecular record from inventory indexes? Correlative matrix chains may be structural affected.');"
                                               class="w-8 h-8 flex items-center justify-center bg-white border border-rose-100 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white hover:border-rose-600 transition-all shadow-sm"
                                               title="Purge From Master Matrix">
                                                <i class="fa-solid fa-trash text-[11px]"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>

                            <tr>
                                <td colspan="5" class="py-16 px-5 text-center">
                                    <div class="flex flex-col items-center justify-center gap-2.5 max-w-sm mx-auto">
                                        <div class="w-11 h-11 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 border border-slate-100">
                                            <i class="fa-solid fa-pills text-lg"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-slate-800">No products configured</p>
                                            <p class="text-xs text-slate-400 mt-0.5">Your primary catalog register is vacant. Initialize operations by adding a new configuration structure card entry above.</p>
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