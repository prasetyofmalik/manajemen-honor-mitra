/* Centralized JavaScript for application views
   Consolidates scripts from mitra (create/edit), kegiatan_mitra (create/edit), and dashboard */

// ============================================
// Phone Number Formatter (Mitra Create/Edit)
// ============================================
(function initPhoneFormatter() {
  const phoneInput = document.getElementById("phone_input");
  if (!phoneInput) return;

  const formatPhone = (val) => {
    let x = val.replace(/\D/g, "");
    if (x.startsWith("62")) {
      // already has 62
    } else if (x.startsWith("0")) {
      x = "62" + x.substring(1); // Replace leading 0 with 62
    } else {
      x = "62" + x; // Prepend 62
    }

    let formatted = "+62 ";
    if (x.length > 2) {
      formatted += x.substring(2, 5); // Segment 1: 3 digits
    }
    if (x.length > 5) {
      formatted += "-" + x.substring(5, 9); // Segment 2: 4 digits
    }
    if (x.length > 9) {
      formatted += "-" + x.substring(9, 14); // Segment 3: max 5 digits
    }
    return formatted;
  };

  // Initial format on page load for edit forms
  window.addEventListener("load", () => {
    if (phoneInput.value) {
      phoneInput.value = formatPhone(phoneInput.value);
    }
  });

  // Format on input
  phoneInput.addEventListener("input", function (e) {
    e.target.value = formatPhone(e.target.value);
  });

  // Prevent deleting the '+62 ' prefix
  phoneInput.addEventListener("keydown", function (e) {
    // 8 is Backspace, 46 is Delete
    if (e.target.selectionStart <= 4 && (e.keyCode === 8 || e.keyCode === 46)) {
      e.preventDefault();
    }
  });
})();

// ============================================
// Select2 & Activity Loader (Kegiatan Mitra)
// ============================================
(function initSelect2AndActivityLoader() {
  // Only run if we have Select2 library
  if (typeof $ === "undefined" || typeof $.fn.select2 === "undefined") {
    return;
  }

  $(document).ready(function () {
    // Initialize Select2 for searchable dropdowns
    $(".select2-search").select2({
      theme: "bootstrap-5",
      width: "100%",
    });

    // Dynamic Activity Loading based on selected survey
    const $surveiSelect = $("#surveiSelect");
    const $kegiatanSelect = $("#kegiatanSelect");

    if ($surveiSelect.length === 0 || $kegiatanSelect.length === 0) {
      return; // Exit if elements not found (not on kegiatan_mitra page)
    }

    $surveiSelect.on("change", function () {
      const surveiId = $(this).val();

      $kegiatanSelect
        .html('<option value="">Memuat kegiatan...</option>')
        .prop("disabled", true);

      if (!surveiId) {
        $kegiatanSelect.html(
          '<option value="">-- Pilih survei terlebih dahulu --</option>'
        );
        return;
      }

      fetch(`${window.APP_BASE_URL}kegiatan/by-survei/${surveiId}`)
        .then((response) => response.json())
        .then((data) => {
          $kegiatanSelect.html("");
          if (data.length === 0) {
            $kegiatanSelect.html(
              '<option value="">Belum ada kegiatan untuk survei ini</option>'
            );
          } else {
            $kegiatanSelect.append(
              '<option value="">-- Pilih Kegiatan --</option>'
            );
            data.forEach((kegiatan) => {
              $kegiatanSelect.append(
                `<option value="${kegiatan.id}">${kegiatan.nama_kegiatan}</option>`
              );
            });
            $kegiatanSelect.prop("disabled", false);
          }
        })
        .catch(() => {
          $kegiatanSelect.html(
            '<option value="">Gagal memuat kegiatan</option>'
          );
        });
    });
  });
})();

// ============================================
// Dashboard Mitra Search Filter
// ============================================
(function initDashboardSearchFilter() {
  const searchInput = document.getElementById("mitraSearchInput");
  if (!searchInput) return; // Exit if not on dashboard page

  const clearBtn = document.getElementById("clearSearch");
  const visibleCountSpan = document.getElementById("visibleRowCount");
  const tableBody = document.querySelector("tbody");

  if (!tableBody) return;

  // Create "no results" row
  const noResultsRow = document.createElement("tr");
  noResultsRow.id = "noResultsRow";
  noResultsRow.innerHTML = `
        <td colspan="100" class="text-center py-5 text-muted">
            <i class="bi bi-person-x d-block fs-4 mb-2"></i>Nama tidak ditemukan
        </td>
    `;
  noResultsRow.style.display = "none";
  tableBody.appendChild(noResultsRow);

  function filterTable() {
    const searchTerm = searchInput.value.toLowerCase();
    const rows = tableBody.querySelectorAll("tr:not(#noResultsRow)");
    let visibleCount = 0;

    rows.forEach((row) => {
      const nameEl = row.querySelector(".fw-bold.text-dark");
      if (!nameEl) return;

      const match = nameEl.textContent.toLowerCase().includes(searchTerm);
      row.style.display = match ? "" : "none";
      if (match) visibleCount++;
    });

    visibleCountSpan.textContent = visibleCount;
    noResultsRow.style.display = visibleCount === 0 ? "" : "none";
  }

  // Attach event listeners
  searchInput.addEventListener("input", filterTable);
  clearBtn.addEventListener("click", () => {
    searchInput.value = "";
    filterTable();
  });
})();
