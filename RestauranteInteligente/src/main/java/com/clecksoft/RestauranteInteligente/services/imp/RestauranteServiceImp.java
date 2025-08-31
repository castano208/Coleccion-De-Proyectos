package com.clecksoft.RestauranteInteligente.services.imp;

import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Service;
import com.clecksoft.RestauranteInteligente.entities.RestauranteEntity;
import com.clecksoft.RestauranteInteligente.repositories.RestauranteJpaRepository;
import com.clecksoft.RestauranteInteligente.services.RestauranteService;

@Service("RestauranteServiceImp")
public class RestauranteServiceImp implements RestauranteService {

	@Autowired
	@Qualifier("RestauranteJpaRepository")
	private RestauranteJpaRepository RestauranteJpa;

	@Override
	public List<RestauranteEntity> listarRestaurante() {
		return RestauranteJpa.findAll();
	}

	@Override
	public RestauranteEntity crearRestaurante(RestauranteEntity Restaurante) {
		return RestauranteJpa.save(Restaurante);
	}

	@Override
	public RestauranteEntity actualizarRestaurante(RestauranteEntity Restaurante) {
		return RestauranteJpa.save(Restaurante);
	}

	@Override
	public boolean borrarRestaurante(RestauranteEntity Restaurante) {
		RestauranteJpa.delete(Restaurante);
		return true;
	}

	@Override
	public RestauranteEntity consultarporNombre(String nombre) {
		return RestauranteJpa.findByNombre(nombre);
	}

}
