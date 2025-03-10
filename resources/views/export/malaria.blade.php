<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
            <th>Berat Badan</th>
            <th>Pekerjaan</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasiens as $index => $pasien)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pasien->nama_pasien }}</td>
                <td>{{ $pasien->usia }}</td>
                <td>{{ $pasien->jenis_kelamin }}</td>
                <td>{{ $pasien->berat_badan }}</td>
                <td>{{ $pasien->pekerjaan }}</td>
                <td>{{ $pasien->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Faskes Pencatat</th>
            <th>Jenis Pemeriksaan</th>
            <th>Tanggal Kunjungan</th>
            <th>Tanggal Pemeriksaan</th>
            <th>Jenis Parasit</th>
            <th>Derajat Malaria</th>
            <th>Kekambuhan</th>
            <th>Tanggal Gejala</th>
            <th>Gametosit</th>
            <th>Anemia</th>
            <th>Klasifikasi Khusus</th>
            <th>Tanggal Pengobatan</th>
            <th>DHP</th>
            <th>Primaquine</th>
            <th>Status Pengobatan</th>
            <th>Perawatan</th>
            <th>Kematian Dengan Malaria</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tindakans as $index => $tindakan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tindakan->nama_pasien }}</td>
                <td>{{ $tindakan->faskes_pencatat }}</td>
                <td>{{ $tindakan->jenis_pemeriksan }}</td>
                <td>{{ $tindakan->tanggal_kunjungan_pasien }}</td>
                <td>{{ $tindakan->tanggal_pemeriksaan_lab }}</td>
                <td>{{ $tindakan->jenis_parasit }}</td>
                <td>{{ $tindakan->derajat_malaria }}</td>
                <td>{{ $tindakan->kekambuhan }}</td>
                <td>{{ $tindakan->tanggal_gejala }}</td>
                <td>{{ $tindakan->gametosit }}</td>
                <td>{{ $tindakan->anemia }}</td>
                <td>{{ $tindakan->klasifikasi_khusus }}</td>
                <td>{{ $tindakan->tanggal_pengobatan }}</td>
                <td>{{ $tindakan->DHP }}</td>
                <td>{{ $tindakan->primaquine }}</td>
                <td>{{ $tindakan->status_pengobatan }}</td>
                <td>{{ $tindakan->perawatan }}</td>
                <td>{{ $tindakan->kematian_dengan_malaria }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
