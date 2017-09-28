<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="HienHInh">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<h4 class="modal-title" id="myModalLabel">Chi tiết đơn hàng(Mã HĐ: {{ $arItem->id }} - Tên KH: {{ $arItem->fullname }} )</h4>
													<?php 
													$tt = 0;
													?>
													<table>
														<tr>
															<th style="width:10%">IDCT</th>
															<th style="width:30%">Mã SP</th>
															<th>Số lượng</th>
															<th>Giá (VNĐ)</th>
															<th>Tổng tiền</th>
														</tr>
														@foreach($arCT as $item)
														
														<tr>
															<td >{{ $item->id }}</td>
															<td>{{ $item->tensp }}</td>
															<td>{{ $item->soluong }}</td>
															<td>{{ number_format($item->gia) }} đ</td>
															<?php 
															$tongtien = number_format($item->soluong*$item->gia);
															$tt += $item->soluong*$item->gia; 
															?>
															<td>{{ $tongtien }} đ</td>
														</tr>

														@endforeach
														<tr>
															<td colspan="3">
															</td>
															<td colspan="2">
																<b>Thành tiền:</b> {{ number_format($tt) }} VNĐ
															</td>
														</tr>
													</table>

												</div>
											</div>
										</div>