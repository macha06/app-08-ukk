<!-- Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalLabel">Export to Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk memilih tahun dan bulan -->
                <form id="exportForm">
                    @csrf
                    <div class="form-group">
                        <label for="tahun">Tahun:</label>
                        <input type="number" id="tahun" name="tahun" class="form-control" min="2000" max="2099">
                    </div>
                    <div class="form-group">
                        <label for="bulan">Bulan:</label>
                        <select id="bulan" name="bulan" class="form-control">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <!-- Tambahkan opsi untuk bulan-bulan lainnya -->
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="exportButton">Export</button>
            </div>
        </div>
    </div>
</div>