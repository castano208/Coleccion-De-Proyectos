package com.clecksoft.RestauranteInteligente.services;

import java.util.List;

import com.clecksoft.RestauranteInteligente.entities.UsuarioEntity;


public interface UsuarioService {
	
	
	public abstract UsuarioEntity crearUsuario(UsuarioEntity Usuario);
	
	public abstract UsuarioEntity actualizarUsuario(UsuarioEntity Usuario);
	
	public abstract boolean borrarUsuario(UsuarioEntity Usuario);

	public abstract List<UsuarioEntity> listarUsuario();
}
