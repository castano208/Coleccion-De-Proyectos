package com.clecksoft.RestauranteInteligente.services.imp;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Service;
import com.clecksoft.RestauranteInteligente.entities.UsuarioEntity;
import com.clecksoft.RestauranteInteligente.repositories.UsuarioJpaRepository;
import com.clecksoft.RestauranteInteligente.services.UsuarioService;


@Service("UsuarioServiceImp")
public class UsuarioServiceImp implements UsuarioService{

	
	@Autowired
	@Qualifier("UsuarioJpaRepository")
	private UsuarioJpaRepository usuraioJpa;
	
	@Override
	public List<UsuarioEntity> listarUsuario() {
		return usuraioJpa.findAll();
	}
	
	@Override
	public UsuarioEntity crearUsuario(UsuarioEntity Usuario) {		
		return usuraioJpa.save(Usuario);
	}

	@Override
	public UsuarioEntity actualizarUsuario(UsuarioEntity Usuario) {		
		return usuraioJpa.save(Usuario);
	}

	@Override
	public boolean borrarUsuario(UsuarioEntity Usuario) {
		usuraioJpa.delete(Usuario);
		return true;
	}

}
