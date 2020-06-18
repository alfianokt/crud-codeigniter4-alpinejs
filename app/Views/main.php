<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Buku | CodeIgniter 4 + AlpineJS</title>
  <!-- litera theme bootstrap -->
  <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
</head>
<body>

  <div
    class="container"
    x-data="{
      namaBuku: '',
      editIndex: null,
      editText: '',
      panggilUlangDataBuku() { // fungsi untuk mengambil semua data buku dan menyimpan ke variabel buku
        fetch('/buku')
          .then(res => res.json())
          .then(json => this.buku = json)
      },
      buku: <?= str_replace('"', "'", json_encode($buku, JSON_HEX_APOS)); ?> // mengambil semua data buku dari server
    }"
  >
    <div class="card mt-3">
      <div class="card-header">
        <strong>CRUD Buku | CodeIgniter 4 + AlpineJS</strong>
      </div>
      <div class="card-body">
        <div class="col-auto">
          <label class="sr-only" for="inlineFormInputGroup">Nama Buku</label>
          <div class="input-group mb-2">
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nama Buku" x-model="namaBuku">
            <div class="input-group-prepend">
              <button
                class="btn btn-primary"
                @click="
                  if (namaBuku != '') {
                    // jika nama buku tidak kosong maka post data ke server
                    fetch('/buku', {
                      method: 'POST',
                      header: { 'content-type': 'application/json' },
                      body: JSON.stringify({ nama: namaBuku })
                    })
                    .then(res => res.json())
                    .then(json => {
                      if (json.status) {
                        panggilUlangDataBuku()
                        namaBuku = ''
                      } else {
                        alert('Gagal menambah data!')
                      }
                    })
                  }
                "
                x-bind:disabled="namaBuku == ''"
              >
                <strong>&plus;</strong>
                Tambah
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <ul class="list-group mt-3">
      <template x-for="(b, i) in buku">
        <li class="list-group-item">
          <div class="row">
            <div class="col">
              <span x-show.transition.in="editIndex != i">
                <span x-text="b.buku_nama"></span>
              </span>
              <span x-show.transition.in="editIndex == i">
                <input type="text" class="form-control" x-model="editText">
              </span>
            </div>
            <div class="col">
              <div class="float-right">
                <span x-show.transition.in="editIndex != i">
                  <button class="btn btn-info btn-sm" @click="editIndex = i; editText = b.buku_nama">Edit</button>
                </span>
                <span x-show.transition.in="editIndex == i">
                  <button class="btn btn-warning btn-sm" @click="editIndex = null; editText = ''">Batal</button>
                  <button
                    class="btn btn-primary btn-sm"
                    @click="
                      // update data buku
                      fetch('/buku', {
                        method: 'PUT',
                        header: { 'content-type': 'application/json' },
                        body: JSON.stringify({ id: b.buku_id, nama: editText })
                      })
                      .then(res => res.json())
                      .then(json => {
                        if (json.status) {
                          panggilUlangDataBuku()
                          editIndex = null
                          editText = ''
                        } else {
                          alert('Data gagal diupdate!')
                        }
                      })
                    "
                  >
                    Simpan
                  </button>
                </span>
                <button
                  class="btn btn-danger btn-sm"
                  @click="
                    // hapus data buku
                    fetch('/buku', {
                      method: 'DELETE',
                      header: { 'content-type': 'application/json' },
                      body: JSON.stringify({ id: b.buku_id })
                    })
                    .then(res => res.json())
                    .then(json => {
                      if (json.status) {
                        panggilUlangDataBuku()
                      } else {
                        alert('Data gagal dihapus!')
                      }
                    })
                  "
                >
                  Hapus
                </button>
              </div>
            </div>
          </div>
        </li>
      </template>
    </ul>
  </div>
  <!-- load alpine dari cdn -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
</body>
</html>