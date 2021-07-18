<!DOCTYPE html>
<html>

<head>
    <title></title>

</head>
<style>

</style>

<body>
    <div class="content " >
        <center>
            <table width="500">
                <tr>
                    <td></td>
                    <td align="center" >

                        <font size="4" ><b>SURAT TUGAS</b></font><br>
                        <font size="4"><b>Nomor: FT-D/UNSUR/IX/2021</b>
                        </font>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">

                    </td>
                </tr>
            </table>

            <br>
            <table width="500">
                <tr>
                    <td>
                        <font size="2">
                            Ketua Lembaga Penelitian dan Pengabdian kepada Masyarakat Fakultas Teknik menugaskan kepada
                            Dosen/Peneliti Untuk Melaksanakan serangkaian kegiatan penelitian yang namanya tertera
                            dibawah
                            ini:
                        </font>
                    </td>
                </tr>
            </table>

            <table width="500" >
                @foreach($prop1 as $p)
                <tr class="text2">
                    <td width="100" >Nama</td>
                    <td>:</td>
                    <td width="400">{{$p->User->name}}</td>
                </tr>
                <tr class="text2">
                    <td>NIDN</td>
                    <td>:</td>
                    <td>{{$p->User->nidn}}</td>
                </tr>
                <tr>
                    <td>Unit Tugas</td>
                    <td>:</td>
                    <td>{{$p->User->prodi}}</td>
                </tr>
                <tr>
                    <td>Judul Penelitian</td>
                    <td>:</td>
                    <td>{{$p->judul}}</td>
                </tr>
                @endforeach
            </table>
            <br>
            <table width="500">
                <tr>
                    <td>
                        <font size="2"></font>Demikian surat ini dibuat untuk dilaksanakan sebagaimana mestinya.
                    </td>
                </tr>
            </table>
            <br>

            <br>
            </table>


            <br>
            <table width="500">
                <tr>
                    <td width="350"><br><br><br><br></td>
                    <td class="text" align="center">
                        Cianjur,
                        <?php echo date(' d-m-Y'); ?>
                        <br>
                        Ketua LPPM Fakultas Teknik<br><br><br><br>Ai Musrifah, ST., M.Kom.
                    </td>
                </tr>
            </table>
        </center>
    </div>
</body>


</html>