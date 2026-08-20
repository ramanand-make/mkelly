<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once __DIR__ . '/../../app/init.php';
require_once __DIR__ . '/../../app/auth.php';

requireAdminLogin();
require_once __DIR__ . "/../../app/module-data.php";
require_once __DIR__ . "/../../../includes/functions.php";

$pageTitle = " Bookings";

$conn = getSashDBConnection();
$bookings = [];
if ($conn) {
    $res = $conn->query("SELECT * FROM astro_bookings ORDER BY booking_time DESC");
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $bookings[] = $row;
        }
    }
    $conn->close();
}

include LAYOUT_PATH . "/head.php";
?>

<style>
/* ── Horoscope Badge & Panel ───────────────────────────────────────────── */
.horo-toggle-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .5px;
    border-radius: 20px;
    cursor: pointer;
    border: none;
    background: linear-gradient(135deg, #054B2C, #022515);
    color: #fff;
    box-shadow: 0 2px 8px rgba(5,75,44,.35);
    transition: all .2s ease;
}
.horo-toggle-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(193,23,18,.45);
    background: linear-gradient(135deg, #C11712, #7a0e0b);
}
.horo-toggle-btn .horo-count {
    background: rgba(255,255,255,.25);
    border-radius: 10px;
    padding: 1px 7px;
    font-size: 10px;
}
.horo-toggle-btn.no-horo {
    background: #e9ecef;
    color: #6c757d;
    box-shadow: none;
    cursor: default;
}

/* ── Horoscope Popup Panel ─────────────────────────────────────────────── */
.horo-panel {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(10,8,30,.75);
    backdrop-filter: blur(6px);
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.horo-panel.active { display: flex; }

.horo-panel-inner {
    background: linear-gradient(160deg, #022515 0%, #0a081e 100%);
    border: 1px solid rgba(5,75,44,.4);
    border-radius: 16px;
    width: 100%;
    max-width: 720px;
    max-height: 85vh;
    overflow-y: auto;
    padding: 30px;
    box-shadow: 0 20px 60px rgba(0,0,0,.7), 0 0 0 1px rgba(5,75,44,.15);
    position: relative;
    animation: horoSlideIn .25s ease;
}
@keyframes horoSlideIn {
    from { opacity:0; transform:translateY(20px) scale(.97); }
    to   { opacity:1; transform:translateY(0)  scale(1);    }
}

.horo-panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid rgba(5,75,44,.3);
}
.horo-panel-title {
    font-size: 16px;
    font-weight: 700;
    color: #C11712;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 8px;
}
.horo-panel-title .star-icon { font-size: 18px; }
.horo-panel-subtitle {
    font-size: 12px;
    color: #a3b899;
    margin-top: 2px;
}
.horo-close-btn {
    width: 34px; height: 34px;
    display: flex; align-items: center; justify-content: center;
    background: rgba(193,23,18,.2);
    border: 1px solid rgba(193,23,18,.3);
    border-radius: 50%;
    color: #fca5a5;
    font-size: 18px;
    cursor: pointer;
    line-height: 1;
    transition: all .2s;
}
.horo-close-btn:hover {
    background: rgba(193,23,18,.4);
    color: #fff;
    transform: rotate(90deg);
}

/* ── Horoscope Cards ───────────────────────────────────────────────────── */
.horo-cards { display: flex; flex-direction: column; gap: 14px; }
.horo-card {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(5,75,44,.2);
    border-radius: 12px;
    padding: 18px 20px;
    position: relative;
    transition: border-color .2s;
}
.horo-card:hover { border-color: rgba(5,75,44,.4); }

.horo-card-badge {
    position: absolute;
    top: -10px; left: 16px;
    background: linear-gradient(135deg, #054B2C, #022515);
    color: #fff;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .8px;
    padding: 2px 10px;
    border-radius: 20px;
    text-transform: uppercase;
}
.horo-card-name {
    font-size: 15px;
    font-weight: 700;
    color: #e6f4ea;
    margin-bottom: 12px;
    margin-top: 4px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.horo-card-name .person-icon {
    width: 28px; height: 28px;
    background: linear-gradient(135deg, #054B2C, #022515);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px;
}
.horo-fields {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
}
.horo-field {
    background: rgba(0,0,0,.3);
    border-radius: 8px;
    padding: 10px 14px;
    border: 1px solid rgba(255,255,255,.06);
}
.horo-field-label {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #a3b899;
    margin-bottom: 4px;
    display: flex;
    align-items: center;
    gap: 4px;
}
.horo-field-value {
    font-size: 13px;
    font-weight: 600;
    color: #ffffff;
    word-break: break-word;
}
.horo-field-value.empty { color: #6b7280; font-style: italic; font-size: 11px; }

/* ── Empty State ───────────────────────────────────────────────────────── */
.horo-empty {
    text-align: center;
    padding: 30px;
    color: #9ca3af;
}
.horo-empty .empty-icon { font-size: 40px; margin-bottom: 10px; }
.horo-empty p { margin: 0; font-size: 13px; }
</style>

<body class="app sidebar-mini ltr light-mode">
    <div id="global-loader">
        <img src="<?= asset_url("images/loader.svg") ?>" class="loader-img" alt="Loader">
    </div>

    <div class="page">
        <div class="page-main">
            <?php include LAYOUT_PATH . "/header.php"; ?>
            <?php include LAYOUT_PATH . "/sidebar.php"; ?>

            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">
                        <div class="page-header bg-primary-gradient p-4 rounded-3 shadow-sm mb-4">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <span class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; font-size:28px;">
                                        <i class="fe fe-calendar"></i>
                                    </span>
                                </div>
                                <div>
                                    <h1 class="page-title text-white fw-bold mb-1"> Bookings</h1>
                                    <p class="text-white-50 mb-0">View and manage all astrologer bookings</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">All Bookings</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Booking ID</th>
                                                        <th>Customer Details</th>
                                                        <th>Service Info</th>
                                                        <th>Person Details</th>
                                                        <th>Country</th>
                                                        <th>Amount</th>
                                                        <th>Payment Status</th>
                                                        <th>Booking Date</th>
                                                        <th>Booking Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $id = 1; if (empty($bookings)): ?>
                                                        <tr><td colspan="7" class="text-center">No bookings found yet.</td></tr>
                                                    <?php else: ?>
                                                        <?php foreach ($bookings as $idx => $booking):
                                                            $horoscopes = [];
                                                            if (!empty($booking['horoscopes'])) {
                                                                $decoded = json_decode($booking['horoscopes'], true);
                                                                if (is_array($decoded)) $horoscopes = $decoded;
                                                            }
                                                            $horoCount = count($horoscopes);
                                                            $panelId   = 'horo-panel-' . $idx;
                                                        ?>
                                                        <tr>
                                                            <td><?=$id++ ?></td>
                                                            <td class="align-middle"><strong><?= htmlspecialchars($booking['id']) ?></strong></td>
                                                            <td class="align-middle">
                                                                <div class="fw-bold"><?= htmlspecialchars($booking['name'] ?? '') ?></div>
                                                                <div class="text-muted small"><?= htmlspecialchars($booking['email'] ?? '') ?></div>
                                                                <div class="text-muted small"><?= htmlspecialchars($booking['whatsapp'] ?? '') ?></div>
                                                                <div class="text-muted small"><?= htmlspecialchars($booking['country_group'] ?? '') ?></div>
                                                            </td>
                                                            
                                                            <td class="align-middle">
                                                                <div class="fw-bold"><?= htmlspecialchars($booking['service'] ?? '') ?></div>
                                                                <?php if (!empty($booking['service_tier'])): ?>
                                                                    <div class="text-muted small">Tier: <?= htmlspecialchars(ucfirst($booking['service_tier'])) ?></div>
                                                                <?php endif; ?>
                                                            </td>

                                                            <!-- ── Horoscope Cell ── -->
                                                            <td class="align-middle" style="min-width:130px;">
                                                                <?php if ($horoCount > 0): ?>
                                                                    <button class="horo-toggle-btn"
                                                                            onclick="openHoroPanel('<?= $panelId ?>')"
                                                                            title="View Horoscope Details">
                                                                        🔮 Person
                                                                        <span class="horo-count"><?= $horoCount ?></span>
                                                                    </button>
                                                                <?php else: ?>
                                                                    <button class="horo-toggle-btn no-horo" disabled>
                                                                        ✦ No Data
                                                                    </button>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <div class="text-muted"><?= htmlspecialchars($booking['country_group'] ?? '') ?></div>
                                                            </td>
                                                            <td class="align-middle fw-bold"><?= htmlspecialchars($booking['amount'] ?? '') ?></td>
                                                            <td class="align-middle">
                                                                <?php
                                                                    $status = strtolower($booking['payment_status'] ?? 'pending');
                                                                    $badgeClass = 'warning';
                                                                    if ($status === 'success') $badgeClass = 'success';
                                                                    if ($status === 'failed') $badgeClass = 'danger';
                                                                ?>
                                                                <span class="badge bg-<?= $badgeClass ?>">
                                                                    <?= ucfirst($booking['payment_status'] ?? 'Pending') ?>
                                                                </span>
                                                                <?php if (!empty($booking['payment_ref'])): ?>
                                                                    <div class="text-muted small mt-1">Ref: <?= htmlspecialchars($booking['payment_ref']) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?= $booking['booking_time'] ? date('d M Y, h:i A', strtotime($booking['booking_time'])) : 'N/A' ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <select class="form-select booking-status"
                                                                        data-booking-id="<?= $booking['id'] ?>">
                                                                    
                                                                    <option value="just created"
                                                                        <?= $booking['booking_status'] == 'just created' ? 'selected' : '' ?>>
                                                                        Just Created
                                                                    </option>
                                                            
                                                                    <option value="consultent inprocess"
                                                                        <?= $booking['booking_status'] == 'consultent inprocess' ? 'selected' : '' ?>>
                                                                        Consultant In Process
                                                                    </option>
                                                            
                                                                    <option value="consultent complete"
                                                                        <?= $booking['booking_status'] == 'consultent complete' ? 'selected' : '' ?>>
                                                                        Consultant Complete
                                                                    </option>
                                                            
                                                                    <option value="cancelled"
                                                                        <?= $booking['booking_status'] == 'cancelled' ? 'selected' : '' ?>>
                                                                        Cancelled
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <!-- ── Horoscope Modal Panel ── -->
                                                        <?php if ($horoCount > 0): ?>
                                                        <div class="horo-panel" id="<?= $panelId ?>" onclick="closeHoroPanelOnBg(event, '<?= $panelId ?>')">
                                                            <div class="horo-panel-inner">
                                                                <div class="horo-panel-header">
                                                                    <div>
                                                                        <div class="horo-panel-title">
                                                                            <span class="star-icon">🔮</span>
                                                                            Horoscope Details
                                                                        </div>
                                                                        <div class="horo-panel-subtitle">
                                                                            Booking #<?= htmlspecialchars($booking['id']) ?> &nbsp;·&nbsp;
                                                                            <?= htmlspecialchars($booking['name'] ?? '') ?> &nbsp;·&nbsp;
                                                                            <?= $horoCount ?> person<?= $horoCount > 1 ? 's' : '' ?>
                                                                        </div>
                                                                    </div>
                                                                    <button class="horo-close-btn" onclick="closeHoroPanel('<?= $panelId ?>')" title="Close">×</button>
                                                                </div>

                                                                <div class="horo-cards">
                                                                    <?php foreach ($horoscopes as $hi => $h): ?>
                                                                    <div class="horo-card">
                                                                        <span class="horo-card-badge">Person <?= $hi + 1 ?></span>
                                                                        <div class="horo-card-name">
                                                                            <span class="person-icon">👤</span>
                                                                            <?= htmlspecialchars($h['name'] ?? 'Unnamed') ?>
                                                                        </div>
                                                                        <div class="horo-fields">
                                                                            <div class="horo-field">
                                                                                <div class="horo-field-label">📅 Date of Birth</div>
                                                                                <div class="horo-field-value <?= empty($h['dob']) ? 'empty' : '' ?>">
                                                                                    <?= !empty($h['dob']) ? htmlspecialchars($h['dob']) : '—' ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="horo-field">
                                                                                <div class="horo-field-label">⏰ Birth Time</div>
                                                                                <div class="horo-field-value <?= empty($h['time']) ? 'empty' : '' ?>">
                                                                                    <?= !empty($h['time']) ? date('h:i A', strtotime($h['time'])) : '—' ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="horo-field">
                                                                                <div class="horo-field-label">📍 Birth Place</div>
                                                                                <div class="horo-field-value <?= empty($h['place']) ? 'empty' : '' ?>">
                                                                                    <?= !empty($h['place']) ? htmlspecialchars($h['place']) : '—' ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php endforeach; ?>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php endif; ?>

                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include LAYOUT_PATH . "/footer.php"; ?>
    </div>

    <?php include LAYOUT_PATH . "/scripts.php"; ?>
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#basic-datatable')) {
                $('#basic-datatable').DataTable().destroy();
            }
            $('#basic-datatable').DataTable({
                pageLength: 15,
                lengthMenu: [[15, 30, 50, -1], [15, 30, 50, "All"]],
                language: {
                    searchPlaceholder: 'Search bookings...',
                    sSearch: '',
                },
                order: [[6, 'desc']]
            });
        });

        function openHoroPanel(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeHoroPanel(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = '';
        }
        function closeHoroPanelOnBg(event, id) {
            if (event.target === document.getElementById(id)) {
                closeHoroPanel(id);
            }
        }
        // ESC key closes any open panel
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.horo-panel.active').forEach(function(p) {
                    p.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }
        });
    </script>
    <script>
    /* ── Booking Status Update ──────────────────────────────────────────────
       Root cause of "all rows update together":
         DataTables destroys & recreates DOM nodes on EVERY draw. The
         .prop('disabled', true) call in the change handler itself triggers
         a DataTables redraw. The recreated <select> nodes have NO
         data-original-value, so ALL of them pass the value-comparison guard
         and fire simultaneous AJAX calls.

       Fix – mousedown reference gate:
         On mousedown, we store a reference to EXACTLY the element the user
         physically clicked. The change handler bails immediately if
         `this !== activeSelect`. DataTables-redrawn nodes are brand-new DOM
         objects — they can never equal activeSelect, so they are silently
         ignored no matter what value they hold.
    ──────────────────────────────────────────────────────────────────────── */

    var activeSelect   = null;   // the exact DOM node the user clicked
    var previousValue  = null;   // its value at the moment of mousedown

    // Record WHICH select the user physically opened (mousedown fires before change)
    $(document).on('mousedown', '.booking-status', function () {
        activeSelect  = this;
        previousValue = this.value;          // snapshot value before user picks
    });

    $(document).on('change', '.booking-status', function () {

        // ► Guard 1: Only fire for the select the user actually clicked.
        //   All DataTables-redrawn nodes are new DOM objects ≠ activeSelect.
        if (this !== activeSelect) return;

        var selectBox     = $(this);
        var bookingId     = selectBox.data('booking-id');
        var bookingStatus = selectBox.val();

        // ► Guard 2: Value must have genuinely changed (e.g. user re-picks same option)
        if (bookingStatus === previousValue) {
            activeSelect = null;
            return;
        }

        activeSelect = null;   // clear; next interaction will re-set it

        // Disable only THIS select during save (does NOT touch other rows)
        selectBox.prop('disabled', true);

        $.ajax({
            url: 'ajax/update-booking-status.php',
            type: 'POST',
            dataType: 'json',
            data: {
                booking_id    : bookingId,
                booking_status: bookingStatus
            },
            success: function (response) {
                if (response.success) {
                    showStatusToast('Booking #' + bookingId + ' status updated.', 'success');
                } else {
                    selectBox.val(previousValue);   // revert on failure
                    showStatusToast('' + (response.message || 'Update failed.'), 'danger');
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                selectBox.val(previousValue);
                showStatusToast('Network error — please try again.', 'danger');
            },
            complete: function () {
                selectBox.prop('disabled', false);
            }
        });
    });

    /* Simple inline toast – no extra library needed */
    function showStatusToast(msg, type) {
        var toast = $('<div>')
            .addClass('alert alert-' + type + ' alert-dismissible shadow-sm')
            .css({
                position: 'fixed',
                bottom: '24px',
                right: '24px',
                zIndex: 99999,
                minWidth: '280px',
                fontSize: '13px',
                animation: 'none'
            })
            .html(msg + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>');
        $('body').append(toast);
        setTimeout(function () { toast.fadeOut(400, function () { toast.remove(); }); }, 3500);
    }
    </script>
</body>
</html>
