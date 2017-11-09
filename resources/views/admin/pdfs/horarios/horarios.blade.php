<table align="center">
	<tr>
		<td>
			<img src="..\public\img\escudo.png">
		</td>
		<td>
			<center>República Bolivariana de Venezuela</center>
			<center>Ministerio del Poder Popular para la Educación</center>
			<center>Unidad Educativa Colegio "Urdaneta y Campo Elías"</center>
			<center>COD. DEA. PD09110505- COD. ADMIN.. 51660- RIF V-03376811-3</center>
			<center>LA VICTORIA- ESTADO ARAGUA TELF. 02448080090-9712341</center>
		</td>
		<td>
			<img src="..\public\img\escudo.png">
		</td>
	</tr>
</table>

<br><br><br>

<section>
	<h2 align="center">Horario de asignaturas</h2>

	<table>
		<tr>
			<td> Horario del curso: <strong>{{$secciones->curso->curso}}</strong></td>
			<td> en la sección: <strong>{{$secciones->seccion}}</strong></td>
			<td> en el período: <strong>{{$periodos->periodo}}</strong></td>
		</tr>
	</table>
</section>
<br><br>
<section>                
	<table class="table table-striped" width="100%" border="1">
                <thead>
                <tr align="center">
                  <th>Hora</th>
                  @foreach($dias as $dia)
                  <th>{{$dia->dia}}</th>
                  @endforeach
                </tr>
                @if($secciones->curso->id<=7)
                  <?php $fin=7; ?>
                @else
                  <?php $fin=9; ?>
                @endif
                 @for ($i=0; $i < $fin; $i++) 
                 <tr>
                    @for ($j=0; $j < 6; $j++)  
                      @if($j==0)
                        <td align="center" style="border-radius: 8px; background-color: {{$colores[$i][$j]}}"><strong>{{$bloquesx[$i][$j]}}</strong></td>
                      @else
                        <td align="center" style="border-radius: 8px; background-color: {{$colores[$i][$j]}}">
                        <strong>
                      @if($bloquesx[$i][$j]!="LIBRE")
                        <div style="width: 100%;  padding-left: 0px; padding-top: 0px;">{{$bloquesx[$i][$j]}}-A:{{$aula[$i][$j]}}</div>
                        
                      @else
                        {{$bloquesx[$i][$j]}}
                      @endif</strong></td>
                      @endif
                    @endfor
                  </tr> 
                @endfor
                </thead>
                <tbody>
                </tbody>
                
              </table>
               
</section>