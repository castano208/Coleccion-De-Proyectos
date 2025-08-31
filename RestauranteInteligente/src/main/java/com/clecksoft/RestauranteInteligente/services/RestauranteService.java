package com.clecksoft.RestauranteInteligente.services;

import java.util.List;

import com.clecksoft.RestauranteInteligente.entities.RestauranteEntity;

public interface RestauranteService {
	
	public abstract List<RestauranteEntity> listarRestaurante();

	public abstract RestauranteEntity crearRestaurante(RestauranteEntity Restaurante);
	
	public abstract RestauranteEntity actualizarRestaurante(RestauranteEntity Restaurante);
	
	public abstract boolean borrarRestaurante(RestauranteEntity Restaurante);
	
	public abstract RestauranteEntity consultarporNombre(String nombre);
	
	
}
